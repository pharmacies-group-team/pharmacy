<?php

namespace Database\Seeders;

use App\Models\PerodicOrder;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PerodicOrderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    PerodicOrder::insert([
      ['order_id' => 1, 'is_active' => 1, 'start_date' => Carbon::create('2022', '05', '21'), 'perodic_date_type' => 'weekly', 'next_order_date' => Carbon::create('2022', '05', '28'), 'user_id' => 3],
      ['order_id' => 2, 'is_active' => 1, 'start_date' => Carbon::create('2022', '05', '22'), 'perodic_date_type' => 'monthly', 'next_order_date' => Carbon::create('2022', '06', '28'), 'user_id' => 3],
      ['order_id' => 3, 'is_active' => 0, 'start_date' => Carbon::create('2022', '06', '1'), 'perodic_date_type' => 'weekly', 'next_order_date' => Carbon::create('2022', '06', '8'), 'user_id' => 3]
    ]);
  }
}
