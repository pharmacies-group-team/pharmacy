<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ad::create(
            [
                'title' => 'one',
                'image' => 'default_ad.png',
                'link' => 'https://google.com',
                'ad_position' => 'home',
                'start_at' => '2022-05-01',
                'end_at' => '2022-05-18',
                'user_id' => 1
            ],
            [
                'title' => 'two',
                'image' => 'default_ad.png',
                'link' => 'https://twitter.com',
                'ad_position' => 'home',
                'start_at' => '2022-05-01',
                'end_at' => '2022-05-18',
                'user_id' => 1
            ],
            [
                'title' => 'three',
                'image' => 'default_ad.png',
                'link' => 'https://twitter.com',
                'ad_position' => 'home',
                'start_at' => '2022-05-01',
                'end_at' => '2022-05-18',
                'user_id' => 1
            ]
        );
    }
}
