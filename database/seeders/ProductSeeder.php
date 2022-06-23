<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        [
            'name'=>'LG C2 77-inch evo OLED TV',
            'price'=>"$3,299.99",
            "description"=>"A smartphone with 4gb ram and much more feature",
            "category"=>"tv",
            "gallery"=>"https://images.samsung.com/is/image/samsung/p6pim/bd/ua32t4400arxfs/gallery/bd-hd-t4300-ua32t4400arxfs-467032390?$650_519_PNG$",
        ],
        [
            'name'=>' 27" UltraGear UHD Nano IPS 1ms 144Hz HDR600 Monitor with G-SYNC® Compatibility',
            'price'=>"200$",
            "description"=>"A smartphone with 4gb ram and much more feature",
            "category"=>"monitor",
            "gallery"=>"https://www.startech.com.bd/image/cache/catalog/monitor/xiaomi/redmi/redmi-01-500x500.jpg",
        ],
        [    'name'=>'LG CordZero™ A9 Kompressor Stick Vacuum with Power Mop - Vintage Wine',
            'price'=>"200$",
            "description"=>"A smartphone with 4gb ram and much more feature",
            "category"=>"vaccum",
            "gallery"=>"https://images.samsung.com/is/image/samsung/p6pim/bd/ua32t4400arxfs/gallery/bd-hd-t4300-ua32t4400arxfs-467032390?$650_519_PNG$",
        ],
        [   
            'name'=>'LG STUDIO 24 cu. ft. Smart InstaView® Door-in-Door® Large Capacity Counter-Depth Refrigerator with Craft Ice™ Maker',
            'price'=>"200$",
            "description"=>"A smartphone with 4gb ram and much more feature",
            "category"=>"Refrigerator",
            "gallery"=>"https://images.samsung.com/is/image/samsung/p6pim/bd/ua32t4400arxfs/gallery/bd-hd-t4300-ua32t4400arxfs-467032390?$650_519_PNG$",
        ]
        ]);
    }
}
