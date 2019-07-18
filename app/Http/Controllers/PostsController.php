<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index(): \Illuminate\View\View
    {

        $posts = Post::where('published', 1)

            ->orderBy('created_at', 'DESC')
            ->with('user')

            ->paginate(2);

            //->withPath('custom/url');
            //->simplePaginate(1);
        return view('posts', ['posts' => $posts]);
    }
}
