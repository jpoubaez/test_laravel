<?php

namespace Database\Factories;

use App\Models\Comentari;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComentariFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentari::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
            'cos' => $this->faker->paragraph()
        ];
    }
}
