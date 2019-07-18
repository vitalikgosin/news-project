<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $a = Post::where('author_id', \Auth::id())
            ->orderBy('post_title', 'desc')
            ->take(10)
            ->get();

        //$plucked = $a->pluck('text');


        //$b = $a->toArray();

        //return view('admin.posts', ['b'=> $a]);


        return view('admin.general', ['posts'=>  $a]);



    }


}
