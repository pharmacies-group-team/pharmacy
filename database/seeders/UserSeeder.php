<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\Address;
use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use App\Models\PharmacySocial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create(
      [
        'name'              => "مختار غالب",
        'email'             => 'super@gmail.com',
        'email_verified_at' => now(),
        'password'          => bcrypt('123456789'),
        'phone'             => '773773773'
      ]
    )->assignRole(RoleEnum::SUPER_ADMIN);

    $pharmacy = User::create(
      [
        'name'              => "نايف سمير",
        'email'             => 'pharmacy@gmail.com',
        'email_verified_at' => now(),
        'password'          => bcrypt('123456789'),
        'phone'             => '773773773'
      ]
    )->assignRole(RoleEnum::PHARMACY);

    Pharmacy::create(
      [
        'name'            => 'صيدلية توكيو',
        'user_id'         => $pharmacy->id,
        'neighborhood_id' => 1
      ]
    );

    User::create(
      [
        'name'              => "أحلام محمد",
        'email'             => 'client@gmail.com',
        'email_verified_at' => now(),
        'password'          => bcrypt('123456789'),
        'phone'             => '773773773'
      ]
    )->assignRole(RoleEnum::CLIENT);

    User::factory()->count(20)->create();

    // add user address
    Address::insert(
      [
        [
          "name"          => "محمد عبده",
          "phone"         => 777888999,
          "type_address"  => "home",
          "desc"          => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى",
          "user_id"       => 3
        ],
        [
          "name"          => "Naif",
          "phone"         => 777888999,
          "type_address"  => "home",
          "desc"          => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى",
          "user_id"       => 3
        ]
      ]
    );

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
