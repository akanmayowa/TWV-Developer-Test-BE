<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Computer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComputerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Computer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $make = $this->faker->randomElement(['Apple', 'Dell', 'HP', 'Lenovo']);
        $os = ($make == 'Apple' ? 'MacOS' : 'Windows');
        if ($make == 'Apple') {
            $model = $this->faker->randomElement(['MacBook Air', 'MacBook Pro', 'iMac']);
            $cost = $this->faker->numberBetween(850, 1350);
        } elseif ($make == 'Dell') {
            $model = $this->faker->randomElement(['Vostro', 'Inspiron']);
            $cost = $this->faker->numberBetween(400, 800);
        } elseif ($make == 'HP') {
            $model = $this->faker->randomElement(['Elitebook', 'Pavillion']);
            $cost = $this->faker->numberBetween(400, 800);
        } elseif ($make == 'Lenovo') {
            $model = 'Thinkpad';
            $cost = $this->faker->numberBetween(400, 800);
        }

        return [
            'make' => $make,
            'model' => $model,
            'serial_number' => $this->faker->numberBetween(10000000, 99999999),
            'condition' => $this->faker->randomElement(['new', 'as new', 'some wear and tear', 'needs replacing']),
            'cost_at_purchase' => $cost,
            'os' => $os,
            'purchased' => $this->faker->dateTimeBetween('-7 year', 'now'),
            'asset_id' => function () {
                return Asset::factory()->create();
            },
        ];
    }
}
