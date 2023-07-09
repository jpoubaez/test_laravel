<?php

namespace Database\Factories;

use App\Models\Material_Encarrec;
use App\Models\Material;
use App\Models\Encarrec;

use Illuminate\Database\Eloquent\Factories\Factory;

class Material_EncarrecFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material_Encarrec::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'materials_id' => Material::factory(),  // li creem un dentista random
            'encarrecs_id' => Encarrec::factory(),   // li creem un pacient random
            'quantitat_material' => $this->faker->randomFloat(2,0,9999)
        ];
    }
}
