<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Order::create(['periodic' =>1 , 're_order_date' =>"2022-05-03 17:01:18" ,'status' =>"جاهز" , 'user_id' => 3, 'pharmacy_id' => 1,'address_id'=>1]);
        Order::create(['periodic' =>0 , 'status' =>"جاهز للتوصيل" , 'user_id' => 3, 'pharmacy_id' => 2,'address_id'=>2]);
        Order::create(['periodic' =>1 , 're_order_date' =>"2022-05-03 17:01:18" ,'status' =>"جاهز" , 'user_id' => 5, 'pharmacy_id' => 1,'address_id'=>3]);



    }
}