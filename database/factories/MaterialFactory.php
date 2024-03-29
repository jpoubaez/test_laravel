<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->words(1,true),
            'codimaterial' => $this->faker->unique()->randomNumber(5,true),
            'preu_unitari' => $this->faker->randomFloat(2,0,10)
        ];
    }
}
