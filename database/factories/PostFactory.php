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
            'slug' => $this->faker->unique()->slug(),  // un slug random
            'titol' => $this->faker->sentence(),  // un text random
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',  // un text random
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>'  // un text random
        ];
    }
}
