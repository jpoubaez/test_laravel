<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();

        return view('posts.index',[
            'posts' => Post::latest()->filtre(
                request(['cerca','categoria','autor'])
//            )->get()
            )->paginate(6)->withQueryString()
        ]);
    }

    public function mostra(Post $post)
    {
        return view('posts.mostra',[
        'posts_din' => $post
        ]);
    }

    public function afegir_post(Post $post)
    {
        return view('posts.afegir');
    }

    public function guardar_post(Post $post)
    {
        
        $atributs = request()->validate([
            'titol' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'categoria_id' => ['required', Rule::exists('categories','id')] // numero categoria existent a la taula categories
        ]);

        $atributs['user_id'] = auth()->id();
        $atributs['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        
        Post::create($atributs);

        return redirect('/blog');
    }

}
