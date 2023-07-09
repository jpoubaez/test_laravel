<?php

namespace Database\Factories;

use App\Models\Encarrec;
use App\Models\Dentista;
use App\Models\Pacient;

use Illuminate\Database\Eloquent\Factories\Factory;

class EncarrecFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Encarrec::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
            'dentista_id' => Dentista::factory(),  // li creem un dentista random
            'pacient_id' => Pacient::factory(),   // li creem un pacient random
            'descripcio' => $this->faker->words(4,true),      
            'data_entrega' => $this->faker->dateTime()           
        ];

    }
}
