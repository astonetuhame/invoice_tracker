<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Trip;

class InvoiceTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoices = Invoice::all();

        Trip::all()->each(function ($trip) use ($invoices){
            $trip->invoices()->attach(
                $invoices->random()->pluck('id')
            );
        });
    }
}
