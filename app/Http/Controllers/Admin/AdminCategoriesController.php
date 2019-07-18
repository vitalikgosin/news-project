<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;



use App\Category;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//
//
//        //dump($request);
//        $a = Post::where('author_id', \Auth::id())
//            ->orderBy('post_title', 'desc')
//            ->take(10)
//            ->get();
//
//        //$plucked = $a->pluck('text');
//
//
//        $b = $a->toArray();
//
//        return view('admin.posts', ['b'=> $a]);
//        //return view('test', ['a' => $request->input('a'), 'b' =>  $a, 'd' => $plucked]);
//
//
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_form()
    {
        return view('admin.add-category');
    }

    /**
     * post method form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'category_name' => 'required',
            'add_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',

        ]);

        if($request->hasFile('add_img')) {
            $path = $request->file('add_img')->hashName();
            $request->file('add_img')->storeAs('public', $path);
        }



        // $post_data = Posts::create(['title' => $request->request->get('email'), 'postdata'=>$request->request->get('password')]);
        $category = new Category;
        $category->category_name = $validatedData['category_name'];

        $category->category_img = $path?? NULL; //isset($path) ? $path : null

        //$post->published = $request->request->has('PublishCourse');
        $category->category_slug = $category->category_name;
       // $category->author_id =  \Auth::id();
        $category->save();
        return redirect(route('home'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */
    public function show(Modelname $modelname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {


        $category_data = Category::where('category_slug', $slug)
            ->first();

        if(!$category_data){

            abort(404);
        }

        // dump($b);
      return view('admin.edit-category', ['categorydata'=> $category_data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {


        $validatedData = $request->validate([
            'title' => 'required',
            'add_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',

        ]);


        $category_data = Post::where('category_slug', $slug)
            ->first();


        if($request->hasFile('add_img')){

            if ($category_data->post_img){

                \Storage::delete('public/'.$category_data->category_img);
            }


            $path = $request->file('add_img')->hashName();
            $request->file('add_img')->storeAs('public', $path);

            $category_data->category_img = $path;

        }


        $category_data->category_name=$validatedData['title'];
       // $category_data->post_content=$request->get('post_content');

        //$postdata->published = $request->request->has('PublishCourse');


        $category_data->category__slug = str_slug($category_data->category_name);

        // sdelat izmenenie slug
        // validaciju na formu redaktirovanija

        $category_data->save();

        return redirect(route('admin.posts'));
    }

    /**
     * Remove img the specified resource from storage.
     *
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */


    public function deleteImg($slug )
    {
        $postdata = Post::where('post_slug', $slug)
            ->first();




            if ($postdata->post_img){

                \Storage::delete('public/'.$postdata->post_img);
            }
        $postdata->post_img = NULL;
        $postdata->save();

       // return redirect(route('admin.edit-course', [$slug]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelname  $modelname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelname $modelname)
    {
        //
    }

    public function delete(Request $request, $slug)
    {
        $category_data = Post::where('category_slug', $slug) ->first();


        $category_data->delete();


        return redirect(route('admin.posts'));
    }

}
