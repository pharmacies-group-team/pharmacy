<?php

namespace Database\Factories;

use App\Enum\OrderEnum;
use App\Enum\QuotationEnum;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\QuotationDetails;
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
        'image'           => 'default.jpg',
        'status'          => OrderEnum::UNPAID_ORDER,
        'user_id'         => 3,
        'pharmacy_id'     => 2
      ];
    }

    public function configure()
    {
      return $this->afterCreating(function (Order $order) {

        $quotation = Quotation::create(
        [
          'total'       => 25000,
          'order_id'    => $order->id,
          'address_id'  => 1
        ] );

        QuotationDetails::create(
          [
            'product_name' => $this->faker->name,
            'product_unit' => QuotationEnum::TYPE_CARTONS,
            'quantity'     => 2,
            'price'        => 3000,
            'total'        => 6000,
            'quotation_id' => $quotation->id
          ]);
        QuotationDetails::create(
          [
            'product_name' => $this->faker->name,
            'product_unit' => QuotationEnum::TYPE_CARTONS,
            'quantity'     => 2,
            'price'        => 2000,
            'total'        => 4000,
            'quotation_id' => $quotation->id
          ]);
        QuotationDetails::create(
          [
            'product_name' => $this->faker->name,
            'product_unit' => QuotationEnum::TYPE_CARTONS,
            'quantity'     => 1,
            'price'        => 1000,
            'total'        => 1000,
            'quotation_id' => $quotation->id
          ]);
        QuotationDetails::create(
          [
            'product_name' => $this->faker->name,
            'product_unit' => QuotationEnum::TYPE_CARTONS,
            'quantity'     => 3,
            'price'        => 3000,
            'total'        => 9000,
            'quotation_id' => $quotation->id
          ]);
        QuotationDetails::create(
          [
            'product_name' => $this->faker->name,
            'product_unit' => QuotationEnum::TYPE_CARTONS,
            'quantity'     => 2,
            'price'        => 4000,
            'total'        => 8000,
            'quotation_id' => $quotation->id
          ]);
      });
    }
}
