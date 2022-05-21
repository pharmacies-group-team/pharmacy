<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    $this->call([
      PermissionSeeder::class,
      UserSeeder::class,
      CitySeeder::class,
      WebInfoSeeder::class,
      PharmacySeeder::class,
      AdSeeder::class,
      OrderSeeder::class,

      // only enable this for testing char.js
      // DevTestSeeder::class
      PerodicOrderSeeder::class

    ]);
  }
}
