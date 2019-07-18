<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index($slug): \Illuminate\View\View
    {

        $postdata = Post::where('post_slug', $slug)
            //->where('published', 1)
            ->with('user')
            ->first();

        if(!$postdata){ abort(404);}

        return view('post', ['postdata'=> $postdata]);


    }

}