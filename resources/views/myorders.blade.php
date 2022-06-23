@extends('master')
@section("content")

<div class ="custom-product">

<div class="col-sm-10">
<div class="trending-wrapper">
    <h4>My Orders</h4>
    @foreach($orders as $item)
    <div class="row searched-item cart-list-divider">
        <div class="col-sm-3">
        <a href="detail/{{$item->id}}">
            <img class="trending-image" src="{{$item->gallery}}">
</div>
</a>

<div class="col-sm-4">
            <div class="order-details">
                <h2><strong>Name :</strong> {{$item->name}}</h2>
                <h5><strong>Delivery : </strong> Status {{$item->status}}</h5>
                <h5><strong>Address : </strong> {{$item->address}}</h5>
                <h5><strong>Payment Status : </strong>{{$item->payment_status}}</h5>
                <h5><strong>Payment Method : </strong> {{$item->payment_method}}</h5>
</div>
</div>

</div>
@endforeach
</div>

</div>
</div>
@endsection