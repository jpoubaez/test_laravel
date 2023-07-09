<?php

namespace Database\Factories;

use App\Models\Factura;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Factura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipus' => $this->faker->randomDigit(),
            'data_generacio' => $this->faker->dateTime(),
            'total_a_cobrar' => $this->faker->randomFloat(2,10,99999),
            'cobrada' => $this->faker->boolean()            
        ];
    }
}
