<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
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
            'name' =>"super",
            'email' => 'super@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789')

        ])->assignRole(RoleEnum::SUPER_ADMIN);

        User::create(
            [
                'name' =>"pharmacy",
                'email' => 'pharmacy@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789')

            ])->assignRole(RoleEnum::PHARMACY);

        User::create(
            [
                'name' =>"client",
                'email' => 'client@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789')

            ])->assignRole(RoleEnum::CLIENT);

        User::factory()->count(50)->create();


    }
}
