<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\Address;
use App\Models\Pharmacy;
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
                'name' => "super",
                'email' => 'super@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789')

            ]
        )->assignRole(RoleEnum::SUPER_ADMIN);

        $pharmacy = User::create(
            [
                'name' => "pharmacy",
                'email' => 'pharmacy@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789')

            ]
        )->assignRole(RoleEnum::PHARMACY);

        Pharmacy::create(
            [
                'name'            => 'Dreams',
                'user_id'         => $pharmacy->id,
            ]
        );

        User::create(
            [
                'name' => "client",
                'email' => 'client@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789')

            ]
        )->assignRole(RoleEnum::CLIENT);

        User::factory()->count(50)->create();

        // add user address
        Address::insert(
            [
                [
                    "name"          => "Naif",
                    "phone"         => 777888999,
                    "type_address"  => "home",
                    "desc"          => "Home is home for us",
                    "user_id"       => 3
                ],
                [
                    "name"          => "Naif",
                    "phone"         => 777888999,
                    "type_address"  => "home",
                    "desc"          => "Home is home for us",
                    "user_id"       => 3
                ]
            ]
        );


        // user_id

    }
}
