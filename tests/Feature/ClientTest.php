<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    public function test_client_index_page()
    {
        $this
            ->get('/client')
            ->assertStatus(302);
    }

    public function test_client_profile_page()
    {
        $this
            ->get('/client/account-settings')
            ->assertStatus(302);
    }

    public function test_client_address_page()
    {
        $this
            ->get('/client/address')
            ->assertStatus(302);
    }

    public function test_client_invoiceProfile_page()
    {
        $this
            ->get('/client/invoice-profile')
            ->assertStatus(302);
    }

    // orders
    public function test_client_orders_page()
    {
        $this
            ->get('/client/orders')
            ->assertStatus(302);

        $this
            ->post('/client/orders')
            ->assertStatus(302);

        $this
            ->post('/client/orders/2')
            ->assertStatus(405);
    }

    // quotation
    public function test_client_quotation_page()
    {
        $this
            ->get('/client/quotation/details/2')
            ->assertStatus(302);
    }

    // payment
    public function test_client_payment_page()
    {
        // TODO fix this test later
        $this
            ->get('/client/success/1323213121')
            ->assertStatus(302);

        $this
            ->get('/client/cancel')
            ->assertStatus(302);

        $this
            ->get('/client/invoice/2')
            ->assertStatus(302);
    }
}
