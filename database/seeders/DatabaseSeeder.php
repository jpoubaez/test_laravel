<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::truncate();
        \App\Models\Category::truncate();
        \App\Models\Post::truncate();

        // \App\Models\User::factory(10)->create();
        $usuari = \App\Models\User::factory()->create();
        
        $personal = \App\Models\Category::create ([
            'nom' => 'Personal','slug' => 'personal'
        ]);

        $familia = \App\Models\Category::create ([
            'nom' => 'Familia','slug' => 'familia'
        ]);

        $work = \App\Models\Category::create ([
            'nom' => 'Work','slug' => 'work'
        ]);

        $hobby = \App\Models\Category::create ([
            'nom' => 'Hobby','slug' => 'hobby'
        ]);

        \App\Models\Post::create([
            'user_id' => $usuari->id,
            'categoria_id' => $familia->id,
            'titol' => 'Post familiar',
            'slug' => 'meu-primer-post',
            'excerpt' => 'Lorem ipsum dolor sit amet.',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit ridiculus ultrices eu sociosqu litora nullam porta class tempor, nostra eleifend purus duis tellus magna scelerisque ut nisl placerat accumsan vitae lectus nisi.</p>'
        ]);

        \App\Models\Post::create([
            'user_id' => $usuari->id,
            'categoria_id' => $hobby->id,
            'titol' => 'Post hobby',
            'slug' => 'meu-segon-post',
            'excerpt' => 'Lorem ipsum dolor sit amet.',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit ridiculus ultrices eu sociosqu litora nullam porta class tempor, nostra eleifend purus duis tellus magna scelerisque ut nisl placerat accumsan vitae lectus nisi.</p>'
        ]);
         
    }
}
