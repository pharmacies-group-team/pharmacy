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

        Directorate::create(['name' => 'مديرية الوحدة' , 'city_id' => 1]);
        Neighborhood::create(['name' => 'المجمع الصناعي', 'directorate_id' => 1]); // 1
        Neighborhood::create(['name' => 'الحي السياسي', 'directorate_id' => 1]); // 2
        Neighborhood::create(['name' => 'عطان', 'directorate_id' => 1]); // 3

        Directorate::create(['name' => 'مديرية التحرير' , 'city_id' => 1]);
        Neighborhood::create(['name' => 'حي التحرير', 'directorate_id' => 2]); // 4
        Neighborhood::create(['name' => 'حي بير العزب', 'directorate_id' => 2]); // 5
        Neighborhood::create(['name' => 'حي القاع', 'directorate_id' => 2]); // 6

        Directorate::create(['name' => 'مديرية معين' , 'city_id' => 1]);
        Neighborhood::create(['name' => 'حي معين', 'directorate_id' => 3]); // 7
        Neighborhood::create(['name' => 'السنينة', 'directorate_id' => 3]); // 8
        Neighborhood::create(['name' => 'حي عصر العليا', 'directorate_id' => 3]); // 9

        //  create new Pharmacy 1
        $pharmacy_1 = Pharmacy::create(
        [
          'name'            => 'صيدلية الحياة',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 1
        ]);
        PharmacyContact::create(
          [
            'phone'       => '773773773',
            'pharmacy_id' => $pharmacy_1->id
          ] );
        PharmacySocial::create(
          [
            'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
            'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
            'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
            'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
            'pharmacy_id' => $pharmacy_1->id
          ]);

    }
}
