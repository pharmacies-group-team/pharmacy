<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Address::create(['desc' => 'جانب سوبر ماركت الهدى' , 'lat' => 14.665305,'lng' => 46.811975, 'user_id' => 3, 'neighborhood_id' => 1,'name'=>'سهى','phone'=>'771234567','address_type'=>'البيت']);
      Address::create(['desc' => 'جانب سيتي مارت ' , 'lat' => 17.665305,'lng' => 96.811975, 'user_id' => 3, 'neighborhood_id' => 2,'name'=>'امير','phone'=>'771234569','address_type'=>'العمل']);
      Address::create(['desc' => 'جانب مستشفى ازال ' , 'lat' => 67.665305,'lng' => 93.811975, 'user_id' => 5, 'neighborhood_id' => 4,'name'=>'سليم','phone'=>'771234561','address_type'=>'البيت']);


    }
}
