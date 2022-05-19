<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerodicOrder;
use Carbon\Carbon;


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
    PerodicOrder::create(
      ['order_id' => 1, 'is_active' => 1, 'start_date' => Carbon::create('2022', '05', '21'), 'perodic_date_type' => 'weekly'],
      ['order_id' => 2, 'is_active' => 1, 'start_date' => Carbon::create('2022', '05', '22'), 'perodic_date_type' => 'monthly'],
      ['order_id' => 3, 'is_active' => 0, 'start_date' => Carbon::create('2022', '06', '21'), 'perodic_date_type' => 'weekly']
    );
  }
}