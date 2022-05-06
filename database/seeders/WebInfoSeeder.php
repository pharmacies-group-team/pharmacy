<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Service;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebInfoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    AboutUs::create(
      [
        'title'     => 'أطلب أدويتك أونلاين',
        'sub_title' => 'الآن يمكنك أن تطلب أي دواء من الصيدلية أون لاين بمنتهى السهولةالآن يمكنك أن تطلب أي دواء من الصيدلية أون لاين بمنتهى السهولة.',
        'about'     => 'الآن يمكنك أن تطلب أي دواء من الصيدلية أون لاين بمنتهى السهولةالآن يمكنك أن تطلب أي دواء من الصيدلية أون لاين بمنتهى السهولة.',
        'user_id'   => 1
      ]
    );

    ContactUs::create(
      [
        'phone'   => '+967 773 773 883',
        'email'   => 'web@gmail.com',
        'user_id' => 1
      ]
    );

    Service::create(
      [
        'name'    => 'الدفع الإلكترونى',
        'desc'    => 'إمكانية الدفع من خلال البطاقة الإئتمانية بكل سرية وأمان.',
        'icon'    => 'service.svg',
        'user_id' => 1
      ]
    );

    Service::create(
      [
        'name'    => 'تكرار الروشته',
        'desc'    => 'إمكانية التوصيل الشهري للأدوية بعيدا عن مشاكل نقص الأدوية.',
        'icon'    => 'service.svg',
        'user_id' => 1
      ]
    );

    Service::create(
      [
        'name'    => 'توصيل الأدوية',
        'desc'    => 'توصيل الأدوية من أقرب صيدلية بسهولة ويسر دقة.',
        'icon'    => 'service.svg',
        'user_id' => 1
      ]
    );

    SocialMedia::create(
      [
        'facebook'  => '',
        'whatsapp'  => '',
        'twitter'   => '',
        'instagram' => '',
        'user_id'   => 1
      ]
    );
  }
}
