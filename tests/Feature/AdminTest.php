<?php

namespace Tests\Feature\web;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /*------------------------------ index admin ------------------------------*/
    public function test_admin_page()
    {
        $this
            ->get('/admin')
            ->assertStatus(302);
    }

    /*------------------------------ user profile ------------------------------*/
    public function test_admin_userProfile_page()
    {
        $this
            ->get('/admin/account-settings')
            ->assertStatus(302);
    }

    /*------------------------------ ads ------------------------------*/
    public function test_admin_ads_page()
    {
        $this
            ->get('/admin/ads')
            ->assertStatus(302);
    }

    /*------------------------------ payment ------------------------------*/
    public function test_admin_payments_page()
    {
        $this
            ->get('/admin/payments')
            ->assertStatus(302);
    }

    /*------------------------------ site content ------------------------------*/
    public function test_admin_control_site_content_pages()
    {
        $this
            ->get('/admin/site')
            ->assertStatus(302);

        $this
            ->put('/admin/site/about-us')
            ->assertStatus(302);

        // services
        $this
            ->post('/admin/site/services')
            ->assertStatus(302);

        $this
            ->put('/admin/site/services/1')
            ->assertStatus(302);

        $this
            ->delete('/admin/site/services/1')
            ->assertStatus(302);

        // contact-us
        $this
            ->put('/admin/site/contact-us')
            ->assertStatus(302);

        // social
        $this
            ->put('/admin/site/social')
            ->assertStatus(302);
    }

    /*------------------------------ clients ------------------------------*/
    public function test_admin_clients_page()
    {
        $this
            ->get('/admin/clients')
            ->assertStatus(302);

        $this
            ->post('/admin/clients/toggle/2')
            ->assertStatus(302);
    }

    /*------------------------------ pharmacies ------------------------------*/
    public function test_admin_pharmacies_page()
    {
        $this
            ->get('/admin/pharmacies')
            ->assertStatus(302);

        $this
            ->post('/admin/clients/toggle/2')
            ->assertStatus(302);
    }
}
