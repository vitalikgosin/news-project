<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use DB;

class CategoriesController extends Controller
{
    public function index(): \Illuminate\View\View
    {

//        $category_posts = Post::where('category_id', '*')
//            ->orderByDesc('created_at')
//            ->with('user')
//
//            ->paginate(2);
        $category_posts  = DB::table('posts')
            //->orderByDesc('posts.created_at')
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
           // ->get();

        $categories  = DB::table('categories')
            //->orderByDesc('posts.created_at')
            //->with('user')
            ->get();


        $categories_id = array();
        $uniqArr = array();

        foreach ($categories  as $category){


                $categories_id[] = array($category->id => $category->category_name);



        }
        $categoriesids = array_unique($categories_id,  SORT_REGULAR);

        //$categoriesids = array_unique($categories_id);



        //dd($category_posts);


        return view('general', ['category_posts' => $category_posts, 'categories_id' => $categoriesids]);
    }

    public function category_posts($category_id): \Illuminate\View\View
    {

//        $category_posts = Post::where('category_id', '*')
//            ->orderByDesc('created_at')
//            ->with('user')
//
//            ->paginate(2);
        $category_posts  = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('category_id', $category_id)

            ->orderBy('posts.created_at', 'DESC')

            //->with('user')
            ->paginate(2);




        //dd($category_posts);

        //->withPath('custom/url');
        //->simplePaginate(1);
        return view('category', ['category_posts' => $category_posts]);
    }
}
