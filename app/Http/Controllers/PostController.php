<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::latest('updated_at')->with('categoria','autor')->get(); // el with per evitar consultes de més (N+1 problem)
        $posts = Post::latest();
        
        
        //$posts = Post::get();
        //$posts = Post::all(); 

        return view('blog',[
            'posts' => Post::latest()->filtre(request(['cerca','categoria']))->get(),
            'categories' => Category::all(),
            'categoriaActual' => Category::firstWhere('slug',request('categoria'))
        ]);
    }

    public function mostra(Post $post)
    {
        return view('posts',[
        'posts_din' => $post
        ]);
    }

}
