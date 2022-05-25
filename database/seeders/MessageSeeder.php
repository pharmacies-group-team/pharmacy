<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Message::create(['from' => '2', 'to' => '3', 'message' => 'السلام عليكم']);
      Message::create(['from' => '2', 'to' => '3', 'message' => 'بالنسبة للبندول كم الكمية المطلوبة؟']);
      Message::create(['from' => '3', 'to' => '2', 'message' => 'وعليكم السلام']);
      Message::create(['from' => '3', 'to' => '2', 'message' => 'كرتون']);
    }
}
