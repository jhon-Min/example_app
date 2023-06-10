<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Billing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::factory(20)->create();
        Billing::factory(20)->create();
    }
}
