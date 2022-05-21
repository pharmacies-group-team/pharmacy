<?php

namespace Database\Seeders;

use App\Enum\OrderEnum;
use App\Enum\QuotationEnum;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Order::factory()->count(10)->create();

      // Create New Order (order 1 )
      $order_1 = Order::create([
        'order'           => 'اشتي 2 شرائط قياس سكر و 2 جونسون زيت وكرتون بندول إكسترا و واحد واقي شمس من نوع sunScreen',
        'image'           => 'default.jpg', // fixed value
        'status'          => OrderEnum::UNPAID_ORDER, // fixed value
        'user_id'         => 3, // fixed value
        'pharmacy_id'     => 2 // fixed value
      ]);

      // Create New Quotation
      $quotation_order_1 = Quotation::create(
        [
          'total'       => 15800, // total of all products
          'order_id'    => $order_1->id,
          'address_id'  => 1 // fixed value
        ] );

      // product 1
      QuotationDetails::create(
        [
          'product_name' => 'إس دي- شرائط قياس سكر',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 2,
          'price'        => 3000,
          'quotation_id' => $quotation_order_1->id
        ]);
      // product 2
      QuotationDetails::create(
        [
          'product_name' => 'جونسون|زيت',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 2,
          'price'        => 2000,
          'quotation_id' => $quotation_order_1->id
        ]);
      // product 3
      QuotationDetails::create(
        [
          'product_name' => 'بندول إكسترا',
          'product_unit' => QuotationEnum::TYPE_CARTONS,
          'quantity'     => 1,
          'price'        => 4000,
          'quotation_id' => $quotation_order_1->id
        ]);
      // product 4
      QuotationDetails::create(
        [
          'product_name' => 'واقي شمس (sunScreen)',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 1,
          'price'        => 1800,
          'quotation_id' => $quotation_order_1->id
        ]);

      //////////////////////////////////////////////////////////////////////////////////////////

      // Create New Order (order 2 )

      // Create New Quotation

    }
}
