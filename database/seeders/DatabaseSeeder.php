<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $usuari = User::factory()->create([
            'name' => 'Joan Pou'
        ]);
        Post::factory(5)->create([
            'user_id' => $usuari->id
        ]);

        $categoria = Category::factory()->create([
            'nom' => 'Cinema'
        ]);
        Post::factory(5)->create([
            'categoria_id' => $categoria->id
        ]);
        
         
    }
}
