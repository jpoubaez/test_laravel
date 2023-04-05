<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),  // li creem un usuari random
            'categoria_id' => Category::factory(),  // li creem un usuari random
            'slug' => $this->faker->slug(),  // un slug random
            'titol' => $this->faker->sentence(),  // un text random
            'excerpt' => $this->faker->sentence(),  // un text random
            'body' => $this->faker->paragraph()  // un text random
        ];
    }
}
