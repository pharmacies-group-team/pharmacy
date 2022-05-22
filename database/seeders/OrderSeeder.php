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
      // Create New Order (order 2 )
      $order_2 = Order::create([
        'order'           => 'اشتي نيفيا حجم متوسط وشتي معجون اسنان oral-B',
        'image'           => 'default.jpg', // fixed value
        'status'          => OrderEnum::UNPAID_ORDER, // fixed value
        'user_id'         => 3, // fixed value
        'pharmacy_id'     => 2 // fixed value
      ]);
      // Create New Order (order 3 )
      $order_3 = Order::create([
        'order'           => 'اريد شريط نيكسيوم وشريط اسبرين',
        'image'           => 'default.jpg', // fixed value
        'status'          => OrderEnum::UNPAID_ORDER, // fixed value
        'user_id'         => 3, // fixed value
        'pharmacy_id'     => 2 // fixed value
      ]);
      // Create New Order (order 4 )
      $order_4 = Order::create([
        'order'           => 'هات كريم نيفيا كبير و قي شمس disaar ',
        'image'           => 'default.jpg', // fixed value
        'status'          => OrderEnum::UNPAID_ORDER, // fixed value
        'user_id'         => 3, // fixed value
        'pharmacy_id'     => 2 // fixed value
      ]);
      // Create New Order (order 5 )
      $order_5 = Order::create([
        'order'           => 'لو سمحة باكتة سبرين',
        'image'           => 'default.jpg', // fixed value
        'status'          => OrderEnum::UNPAID_ORDER, // fixed value
        'user_id'         => 3, // fixed value
        'pharmacy_id'     => 2 // fixed value
      ]);
      // Create New Order (order 6 )
      $order_6 = Order::create([
        'order'           => 'اشتي 2 واقي شمس من نوع sunScreen',
        'image'           => 'default.jpg', // fixed value
        'status'          => OrderEnum::UNPAID_ORDER, // fixed value
        'user_id'         => 3, // fixed value
        'pharmacy_id'     => 2 // fixed value
      ]);
      // Create New Order (order 7 )
      $order_7 = Order::create([
        'order'           => 'اشتي 3 شريط ديس سكر وزيت جيسون',
        'image'           => 'default.jpg', // fixed value
        'status'          => OrderEnum::UNPAID_ORDER, // fixed value
        'user_id'         => 3, // fixed value
        'pharmacy_id'     => 2 // fixed value
      ]);
      // Create New Order (order 8 )
      $order_8 = Order::create([
        'order'           => 'من فضلك أفضل دواء متوفر عندك لحموضه وحد نيفيا صغير',
        'image'           => 'default.jpg', // fixed value
        'status'          => OrderEnum::UNPAID_ORDER, // fixed value
        'user_id'         => 3, // fixed value
        'pharmacy_id'     => 2 // fixed value
      ]);


      // Create New Quotation 1
      $quotation_order_1 = Quotation::create(
        [
          'total'       => 15800, // total of all products
          'order_id'    => $order_1->id,
          'address_id'  => 1 // fixed value
        ] );
      // Create New Quotation 2
      $quotation_order_2 = Quotation::create(
        [
          'total'       => 2700, // total of all products
          'order_id'    => $order_2->id,
          'address_id'  => 1 // fixed value
        ] );

           // Create New Quotation 3
      $quotation_order_3 = Quotation::create(
        [
          'total'       => 700, // total of all products
          'order_id'    => $order_3->id,
          'address_id'  => 1 // fixed value
        ] );

          // Create New Quotation 4
          $quotation_order_4 = Quotation::create(
            [
              'total'       => 3600, // total of all products
              'order_id'    => $order_4->id,
              'address_id'  => 1 // fixed value
            ] );
          // Create New Quotation 5
          $quotation_order_5 = Quotation::create(
            [
              'total'       => 1500, // total of all products
              'order_id'    => $order_5->id,
              'address_id'  => 1 // fixed value
            ] );
          // Create New Quotation 6
          $quotation_order_6 = Quotation::create(
            [
              'total'       => 3600, // total of all products
              'order_id'    => $order_6->id,
              'address_id'  => 1 // fixed value
            ] );
          // Create New Quotation 7
          $quotation_order_7 = Quotation::create(
            [
              'total'       => 12000, // total of all products
              'order_id'    => $order_7->id,
              'address_id'  => 1 // fixed value
            ] );
          // Create New Quotation 8
          $quotation_order_8 = Quotation::create(
            [
              'total'       => 12800, // total of all products
              'order_id'    => $order_8->id,
              'address_id'  => 1 // fixed value
            ] );

      QuotationDetails::create(
        [
          'product_name' => 'إس دي- شرائط قياس سكر',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 2,
          'price'        => 3000,
          'quotation_id' => $quotation_order_1->id
        ]);
      QuotationDetails::create(
        [
          'product_name' => 'إس دي- شرائط قياس سكر',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 3,
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
        QuotationDetails::create(
          [
            'product_name' => 'جونسون|زيت',
            'product_unit' => QuotationEnum::TYPE_BOTTLE,
            'quantity'     => 1,
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
      QuotationDetails::create(
        [
          'product_name' => 'واقي شمس (sunScreen)',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 2,
          'price'        => 1800,
          'quotation_id' => $quotation_order_6->id
        ]);
      // product 5
      QuotationDetails::create(
        [
          'product_name' => 'واقي شمس (Disaar)',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 1,
          'price'        => 1400,
          'quotation_id' => $quotation_order_4->id
        ]);
      // product 6

      QuotationDetails::create(
        [
          'product_name' => ' كريم بشره حجم كبير (NIVEA)',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 1,
          'price'        => 2200,
          'quotation_id' => $quotation_order_4->id
        ]);
          // product 6
      QuotationDetails::create(
        [
          'product_name' => ' كريم بشره حجم متوسط (NIVEA)',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 1,
          'price'        => 1500,
          'quotation_id' => $quotation_order_2->id
        ]);
          // product 6
      QuotationDetails::create(
        [
          'product_name' => ' كريم بشره حجم صغير (NIVEA)',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 1,
          'price'        => 800,
          'quotation_id' => $quotation_order_8->id
        ]);
      // product 7
      QuotationDetails::create(
        [

          'product_name' => 'نيكسيوم (Nexuium)',
          'product_unit' => QuotationEnum::TYPE_CARTONS,
          'quantity'     => 1,
          'price'        => 300,
          'quotation_id' => $quotation_order_3->id
        ]);
      // product 8
      QuotationDetails::create(
        [
          'product_name' => 'اسبرين شريط (Aspirin)',
          'product_unit' => QuotationEnum::TYPE_RIBBON,
          'quantity'     => 1,
          'price'        => 400,
          'quotation_id' => $quotation_order_3->id
        ]);

        QuotationDetails::create(
          [
            'product_name' => 'باكة اسبرين (Aspirin)',
            'product_unit' => QuotationEnum::TYPE_CARTONS,
            'quantity'     => 1,
            'price'        => 1500,
            'quotation_id' => $quotation_order_5->id
          ]);
      // product 9
      QuotationDetails::create(
        [
          'product_name' => 'معجون اسنان (Colgate Total)',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 1,
          'price'        => 1500,
          'quotation_id' => $quotation_order_1->id
        ]);
      // product 10
      QuotationDetails::create(
        [
          'product_name' => 'معجون اسنان (Oral-B)',
          'product_unit' => QuotationEnum::TYPE_BOTTLE,
          'quantity'     => 1,
          'price'        => 1200,
          'quotation_id' => $quotation_order_2->id
        ]);
      // product 11
      QuotationDetails::create(
        [
          'product_name' => ' أوميبرازول دواء حموضه (omeprazole)',
          'product_unit' => QuotationEnum::TYPE_CARTONS,
          'quantity'     => 1,
          'price'        => 12000,
          'quotation_id' => $quotation_order_8->id
        ]);

      //////////////////////////////////////////////////////////////////////////////////////////

      // Create New Order (order 2 )

      // Create New Quotation

    }
}
