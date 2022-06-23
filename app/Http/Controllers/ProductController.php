<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
//for join we need to use DB
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index()
    {
        $data = Product::all();
        return view ('product', ['products'=>$data]);
    }
    function detail($id)
    {
        $data =  Product::find($id);
        return view('detail',['product'=>$data]);
    }
//add to cart
    function addToCart(Request $req)
    {

        //if user login ,user can see the page otherwise 
        //redirect to home page
        if($req -> session() -> has('user'))
        {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart -> product_id = $req -> product_id;
            $cart -> save();
            return redirect('/');
        }
        else
        {
            return redirect ('/login');
        }
    }

    //show add to cart count
    function cartItem()
    {
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)-> count();
    }

    //Cart Product Listing,we use join here instead of relashionship
    function cartList()
    {
        $userId=Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products', 'cart.product_id','=','products.id')
        ->where ('cart.user_id',$userId)
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=> $products]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(){
        $userId=Session::get('user')['id'];
        $total= $products = DB::table('cart')
        ->join('products', 'cart.product_id','=','products.id')
        ->where ('cart.user_id',$userId)
        ->sum('products.price');

        return view('ordernow',['total'=> $total]);
    }

    function orderPlace(Request $req) // this function will accept the data from form
    {
        $userId=Session::get('user')['id'];
        $allCart=Cart::where('user_id',$userId)->get();
        //we need to save data to the product table and reomove data from cart table
        foreach($allCart as $cart)
        {
            $order=new Order; 
            $order -> product_id=$cart['product_id'];
            $order -> user_id=$cart['user_id'];
            $order -> status="pending";
            $order -> payment_method=$req->payment;
            $order -> payment_status="pending";
            $order -> address=$req->address;
            $order -> save();

            //to remove data from cart
            Cart::where('user_id',$userId)->delete();
        }
        $req->input();
        return redirect('/');
    }

    function myOrders()
    {
        //give old data which presently in ordernow

        $userId=Session::get('user')['id'];
        $orders= DB::table('orders') //we are getting data from orders
        ->join('products', 'orders.product_id','=','products.id') // put the join orders and products
        ->where ('orders.user_id',$userId)
        ->get();

        return view('myorders',['orders'=> $orders]);
    }
}
