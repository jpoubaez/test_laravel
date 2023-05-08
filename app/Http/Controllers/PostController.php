<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

}
