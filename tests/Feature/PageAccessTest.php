<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PageAccessTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeAccess()
    {
        $this->artisan('db:seed --class=SettingsTableSeeder');
        $this->artisan('db:seed --class=HomePageTableSeeder');
        $this->artisan('db:seed --class=HomeSlidesTableSeeder');
        $this->artisan('db:seed --class=SimplePagesTableSeeder');
        $this->get('/')->assertStatus(200);
    }
}
