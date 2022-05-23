<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use App\Models\PharmacySocial;
use App\Models\User;
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
//      Pharmacy::factory()->count(50)->create();

      //  create new Pharmacy 1
      $pharmacy_1 = Pharmacy::create(
        [
          'name'            => 'صيدلية الحياة',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 7
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '773773773',
          'pharmacy_id' => $pharmacy_1->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_1->id
        ]
      );

      //  create new Pharmacy 2
      $pharmacy_2 = Pharmacy::create(
        [
          'name'            => ' صيدلية مدينة سام  ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 11
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01  675326 ',
          'pharmacy_id' => $pharmacy_2->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_2->id
        ]
      );

      //  create new Pharmacy 3
      $pharmacy_3 = Pharmacy::create(
        [
          'name'            => ' صيدلية الوليد فارما   ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 11
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01  684296 ',
          'pharmacy_id' => $pharmacy_3->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_3->id
        ]
      );

      //  create new Pharmacy 4
      $pharmacy_4 = Pharmacy::create(
        [
          'name'            => ' صيدلية ابو وائل  ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 11
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01  674850  ',
          'pharmacy_id' => $pharmacy_4->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_4->id
        ]
      );

      //  create new Pharmacy 5
      $pharmacy_5 = Pharmacy::create(
        [
          'name'            => ' صيدلية واحة الدواء ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 7
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01  231689   ',
          'pharmacy_id' => $pharmacy_5->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_5->id
        ]
      );

      //  create new Pharmacy 6
      $pharmacy_6 = Pharmacy::create(
        [
          'name'            => 'صيدلية المختار  ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 7
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01  470859  ',
          'pharmacy_id' => $pharmacy_6->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_6->id
        ]
      );

      //  create new Pharmacy 7
      $pharmacy_7 = Pharmacy::create(
        [
          'name'            => 'صيدلية الوحدة المركزية  ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 7
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01  402140  ',
          'pharmacy_id' => $pharmacy_7->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_7->id
        ]
      );

      //  create new Pharmacy 8
      $pharmacy_8 = Pharmacy::create(
        [
          'name'            => ' صيدلية اياس فارما ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 8
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '775423781  ',
          'pharmacy_id' => $pharmacy_8->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_8->id
        ]
      );

      //  create new Pharmacy 9
      $pharmacy_9 = Pharmacy::create(
        [
          'name'            => ' صيدلية اليماني  ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 8
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => ' 777680262  ',
          'pharmacy_id' => $pharmacy_9->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_9->id
        ]
      );

      //  create new Pharmacy 10
      $pharmacy_10 = Pharmacy::create(
        [
          'name'            => ' صيدلية ابن حيان ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 1
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01 537566   ',
          'pharmacy_id' => $pharmacy_10->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_10->id
        ]
      );

      //  create new Pharmacy 11
      $pharmacy_11 = Pharmacy::create(
        [
          'name'            => ' صيدلية ابن حيان',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 4
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01  495056  ',
          'pharmacy_id' => $pharmacy_11->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_11->id
        ]
      );

      //  create new Pharmacy 12
      $pharmacy_12 = Pharmacy::create(
        [
          'name'            => ' صيدلية البسام  ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 4
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01 273380',
          'pharmacy_id' => $pharmacy_12->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_12->id
        ]
      );

      //  create new Pharmacy 13
      $pharmacy_13 = Pharmacy::create(
        [
          'name'            => ' صيدلية النعيم ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 12
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => ' 777467466 ',
          'pharmacy_id' => $pharmacy_13->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_13->id
        ]
      );

      //  create new Pharmacy 14
      $pharmacy_14 = Pharmacy::create(
        [
          'name'            => 'صيدلية الصحة اولا ',
          'logo'            => 'pharmacy.png', // fixed value
          'about'           => ' هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة',
          'email'           => 'alheah@gmail.com',
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => 12
        ]
      );
      PharmacyContact::create(
        [
          'phone'       => '01  513282  ',
          'pharmacy_id' => $pharmacy_14->id
        ]
      );
      PharmacySocial::create(
        [
          'whatsapp'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'website'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'facebook'    => 'https://github.com/pharmacies-group-team/pharmacy',
          'twitter'     => 'https://github.com/pharmacies-group-team/pharmacy',
          'pharmacy_id' => $pharmacy_14->id
        ]
      );
    }
}
