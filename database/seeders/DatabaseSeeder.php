<?php

namespace Database\Seeders;

use App\Models\Invoice;
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
        // \App\Models\User::factory(10)->create();
        
        $this->call(TripSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(InvoiceTripSeeder::class);
    }
}
