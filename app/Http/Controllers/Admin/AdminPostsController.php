<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;



use App\Post;
use DB;
use App\Category;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //dump($request);
        $a = Post::where('author_id', \Auth::id())
            ->orderBy('created_at', 'DESC')
            ->get();

        //$plucked = $a->pluck('text');


        $b = $a->toArray();

        return view('admin.posts', ['b'=> $a]);
        //return view('test', ['a' => $request->input('a'), 'b' =>  $a, 'd' => $plucked]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_form()
    {
        $category_posts  = DB::table('categories')->get();

        $categories_id = array();

        foreach ($category_posts  as $cat){

            $categories_id[] = array($cat->id => $cat->category_name);

        }
        $categoriesids = array_unique($categories_id,  SORT_REGULAR);


        return view('admin.add-post', ['categories_id' => $categoriesids]);
    }

    /**
     * post method form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'add_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',

        ]);

        if($request->hasFile('add_img')) {
            $path = $request->file('add_img')->hashName();
            $request->file('add_img')->storeAs('public', $path);
        }



        // $post_data = Posts::create(['title' => $request->request->get('email'), 'postdata'=>$request->request->get('password')]);
        $post = new Post;
        $post->post_title = $validatedData['title'];
        $post->post_content = $request->request->get('post_content');

        //$category = Category::find($post->category_name);

         $post->category_id =  $request->request->get('CategoryFormControlSelect');


        $post->post_img = $path?? NULL; //isset($path) ? $path : null

        //$post->published = $request->request->has('PublishCourse');
        $post->post_slug = $post->post_title;
        $post->author_id =  \Auth::id();
        $post->save();
        return redirect(route('admin.posts'));
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


        $postdata = Post::where('post_slug', $slug)
            ->first();

        if(!$postdata){

            abort(404);
        }

        // dump($b);
      return view('admin.edit-post', ['postdata'=> $postdata]);

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


        $postdata = Post::where('post_slug', $slug)
            ->first();


        if($request->hasFile('add_img')){

            if ($postdata->post_img){

                \Storage::delete('public/'.$postdata->post_img);
            }


            $path = $request->file('add_img')->hashName();
            $request->file('add_img')->storeAs('public', $path);

            $postdata->post_img = $path;

        }


        $postdata->post_title=$validatedData['title'];
        $postdata->post_content=$request->get('post_content');

        //$postdata->published = $request->request->has('PublishCourse');


        $postdata->post_slug = str_slug($postdata->post_title);

        // sdelat izmenenie slug
        // validaciju na formu redaktirovanija

        $postdata->save();

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
        $postdata = Post::where('post_slug', $slug) ->first();


        $postdata->delete();


        return redirect(route('admin.posts'));
    }

}
