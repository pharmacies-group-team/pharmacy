<?php

namespace Database\Factories;

use App\Enum\OrderEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      return [
          'order'           => $this->faker->text,
          'image'           => 'pharmacy.png',
          'status'          => OrderEnum::NEW_ORDER,
          'user_id'         => 3,
          'pharmacy_id'     => 2
      ];
    }
}
