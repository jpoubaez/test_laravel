<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialEncarrecFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'materials_id' => Dentista::factory(),  // li creem un dentista random
            'encarrecs_id' => Pacient::factory(),   // li creem un pacient random
            'quantitat_material' => $this->faker->randomFloat(2,0,9999)
        ];
    }
}
