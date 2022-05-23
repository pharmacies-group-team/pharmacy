<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PharmacyTest extends TestCase
{
  public function test_pharmacy_index_page()
  {
    $this
      ->get('/pharmacy')
      ->assertStatus(302);
  }

  public function test_pharmacy_profile_page()
  {
    $this
      ->get('/pharmacy/profile')
      ->assertStatus(302);
  }

  public function test_pharmacy_messages_page()
  {
    $this
      ->get('/pharmacy/chat')
      ->assertStatus(302);
  }

  public function test_pharmacy_accountSettings_page()
  {
    $this
      ->get('/pharmacy/account-settings')
      ->assertStatus(302);
  }

  //    public function test_pharmacy_invoiceProfile_page()
  //    {
  //        $this
  //            ->get('/pharmacy/invoice-profile')
  //            ->assertStatus(302);
  //    }

  public function test_pharmacy_orders_page()
  {
    $this
      ->get('/pharmacy/orders')
      ->assertStatus(302);
  }

  public function test_pharmacy_ordersRefusal_page()
  {
    $this
      ->get('/pharmacy/orders/refusal/3')
      ->assertStatus(302);
  }

  public function test_pharmacy_quotation_page()
  {
    $this
      ->get('/pharmacy/quotation')
      ->assertStatus(302);

    $this
      ->get('/pharmacy/quotation/details/2')
      ->assertStatus(302);

    $this
      ->get('/pharmacy/quotation/2')
      ->assertStatus(302);
  }

  public function test_pharmacy_update_logo_page()
  {
    $this
      ->post('/pharmacy/update/logo')
      ->assertStatus(302);
  }
}
