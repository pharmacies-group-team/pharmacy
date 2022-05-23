<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\City;
use App\Models\Directorate;
use App\Models\Neighborhood;
use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use App\Models\PharmacySocial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      City::create(['name' => 'صنعاء']);

      Directorate::create(['name' => 'مديرية الوحدة', 'city_id' => 1]);
      Neighborhood::create(['name' => ' بغداد', 'directorate_id' => 1]); // 1
      Neighborhood::create(['name' => 'الحي السياسي', 'directorate_id' => 1]); // 2
      Neighborhood::create(['name' => 'عطان', 'directorate_id' => 1]); // 3

      Directorate::create(['name' => 'مديرية التحرير', 'city_id' => 1]);
      Neighborhood::create(['name' => 'حي التحرير', 'directorate_id' => 2]); // 4
      Neighborhood::create(['name' => 'حي بير العزب', 'directorate_id' => 2]); // 5
      Neighborhood::create(['name' => 'حي القاع', 'directorate_id' => 2]); // 6

      Directorate::create(['name' => 'مديرية معين', 'city_id' => 1]);
      Neighborhood::create(['name' => ' الدائري', 'directorate_id' => 3]); // 7
      Neighborhood::create(['name' => 'الرباط', 'directorate_id' => 3]); // 8
      Neighborhood::create(['name' => 'القاهرة', 'directorate_id' => 3]); // 9

      Directorate::create(['name' => 'مديرية السبعين', 'city_id' => 1]); //10
      Neighborhood::create(['name' => '    الاصبحي ', 'directorate_id' => 4]); //11
      Neighborhood::create(['name' => ' حدة ', 'directorate_id' => 4]); //12
      Neighborhood::create(['name' => ' شارع تعز', 'directorate_id' => 4]); //13
    }
}
