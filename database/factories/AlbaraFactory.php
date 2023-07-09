<?php

namespace Database\Factories;

use App\Models\Albara;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbaraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Albara::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_generacio' => $this->faker->dateTime(),
            'total' => $this->faker->randomFloat(2,10,9999),
            'entregat' => $this->faker->boolean()            
        ];
    }
}
