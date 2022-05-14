<?php

namespace Tests\Feature\web;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    public function test_home_page()
    {
        $this
            ->get('/')
            ->assertStatus(200);
    }

    public function test_pharmacies_page()
    {
        $this
            ->get('/pharmacies')
            ->assertStatus(200);
    }

    public function test_pharmacyProfile_page()
    {
        $this
            ->get('/pharmacies/profile/1')
            ->assertStatus(200);
    }

    public function test_privacy_page()
    {
        $this
            ->get('/privacy')
            ->assertStatus(200);
    }

    public function test_contactUs_page()
    {
        $this
            ->get('/contact-us')
            ->assertStatus(200);
    }

    public function test_aboutUs_page()
    {
        $this
            ->get('/about-us')
            ->assertStatus(200);
    }
}
