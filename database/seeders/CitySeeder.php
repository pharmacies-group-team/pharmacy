<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Directorate;
use App\Models\Neighborhood;
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

        Directorate::create(['name' => 'مديرية الوحدة' , 'city_id' => 1]);
        Neighborhood::create(['name' => 'المجمع الصناعي', 'directorate_id' => 1]);
        Neighborhood::create(['name' => 'الحي السياسي', 'directorate_id' => 1]);
        Neighborhood::create(['name' => 'عطان', 'directorate_id' => 1]);

        Directorate::create(['name' => 'مديرية التحرير' , 'city_id' => 1]);
        Neighborhood::create(['name' => 'حي التحرير', 'directorate_id' => 2]);
        Neighborhood::create(['name' => 'حي بير العزب', 'directorate_id' => 2]);
        Neighborhood::create(['name' => 'حي القاع', 'directorate_id' => 2]);

        Directorate::create(['name' => 'مديرية معين' , 'city_id' => 1]);
        Neighborhood::create(['name' => 'حي معين', 'directorate_id' => 3]);
        Neighborhood::create(['name' => 'السنينة', 'directorate_id' => 3]);
        Neighborhood::create(['name' => 'حي عصر العليا', 'directorate_id' => 3]);

    }
}
