<?php

namespace Database\Seeders;

use App\Enum\OrderEnum;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevTestSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /************** orders ************/
    $order4 = [
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-04-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-04-01 23:45:50'
      ],
    ];
    $order5 = [
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-05-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-05-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-05-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-05-01 23:45:50'
      ],
    ];

    $order6 = [
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-06-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-06-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-06-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-06-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-06-01 23:45:50'
      ],
      [
        'order'           => 'bla bla bla',
        'status'          => OrderEnum::UNPAID_ORDER,
        "image"           => '',
        'user_id'         => 1,
        'pharmacy_id'     => 2,
        "created_at"      => '2022-06-01 23:45:50'
      ],
    ];

    Order::insert(
      [
        ...$order4,
        ...$order5,
        ...$order6,
      ]
    );

    /************** orders ************/
    /************** orders ************/
  }
}
