<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Pharmacy::factory()->count(50)->create();
    }
}
