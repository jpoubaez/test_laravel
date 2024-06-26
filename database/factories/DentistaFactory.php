<?php

namespace Database\Factories;

use App\Models\Dentista;
use Illuminate\Database\Eloquent\Factories\Factory;

class DentistaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dentista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->firstName(),
            'cognoms' => $this->faker->lastName(),
            'clinica' => $this->faker->unique()->sentence(2),
            'adresa' => $this->faker->streetAddress(),
            'codipostal' => $this->faker->randomNumber(5,true),
            'ciutat' => $this->faker->city(),
            'fotodentista' => 'thumbnails/dentista.jpg',
            'NIF' => $this->faker->unique()->randomNumber(8,true),
            'numcolegiat' => $this->faker->unique()->randomNumber(5,true)
        ];
    }
}
