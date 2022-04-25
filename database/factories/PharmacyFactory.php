<?php

namespace Database\Factories;

use App\Enum\RoleEnum;
use App\Models\Neighborhood;
use App\Models\Pharmacy;
use App\Models\PharmacyContact;
use App\Models\PharmacySocial;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pharmacy>
 */
class PharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'name'            => $this->faker->name,
          'logo'            => 'pharmacy.png',
          'about'           => $this->faker->text,
          'email'           => $this->faker->email,
          'user_id'         => User::inRandomOrder()->role(RoleEnum::PHARMACY)->first()->id,
          'neighborhood_id' => Neighborhood::inRandomOrder()->first()->id
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Pharmacy $pharmacy) {

            PharmacyContact::create(
              [
                'phone'       => $this->faker->phoneNumber,
                'pharmacy_id' => $pharmacy->id
            ] );

            PharmacySocial::create(
              [
                'whatsapp'    => $this->faker->url,
                'website'     => $this->faker->url,
                'facebook'    => $this->faker->url,
                'twitter'     => $this->faker->url,
                'pharmacy_id' => $pharmacy->id
              ]);
        });
    }
}
