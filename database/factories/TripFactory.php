<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'loading_date' => Carbon::now()->subDays(rand(1, 23))->startOfDay(),
            'truck_no' => Arr::random(['KCA 280X', 'KBY 611X', 'KCE 240C', 'KDB 140Y', 'KBN 111X']),
            'product' => Arr::random(['PMS', 'AGO', 'JET', 'IK', 'VPOWER']),
            'loading_depot' => Arr::random(['KISUMU', 'ELDORET', 'NAIROBI', 'MOMBASA']),
            'client' => Arr::random(['VIVO', 'TOTAL', 'TRISTAR', 'UNOC']),
            
        ];
    }
}
