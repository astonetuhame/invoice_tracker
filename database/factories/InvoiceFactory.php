<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'offloading_date' => Carbon::now(),
            'offloading_point' => Arr::random(['KAMPALA DEPOT', 'MBALE DEPOT', 'ENTEBBE', 'JINJA DEPOT']),
            'delivery_note_no' => rand(81400000, 81500000),
        ];
    }
}
