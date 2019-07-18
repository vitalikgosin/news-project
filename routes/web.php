<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('general');
});
*/
Route::get('/', 'CategoriesController@index')->name('general');
Route::get('/category/{category_id}', 'CategoriesController@category_posts')->name('category_posts');

//Route::get("/", ["as"=>"home","uses"=>'CategoriesController@index']);


//Route::get('/general', 'CategoriesController@index')->name('general');

Auth::routes();

Route::get('/home', 'Admin\HomeController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/post/{slug}', 'PostController@index')->name('post');

Route::get('/categories/{category_slug}', 'CategoriesController@index')->name('categories');

Route::group(['middleware' => 'auth'], function () {
    //Route::get('admin', 'Admin\AdminIndexController@index');


    Route::get('admin', 'Admin\HomeController@index')->name('home');

    //---------------------------------------------------------posts

    Route::get('admin/posts', 'Admin\AdminPostsController@index')->name('admin.posts');

    Route::get('admin/add-post', 'Admin\AdminPostsController@create_form');

    Route::post('admin/add-post', 'Admin\AdminPostsController@create')->name('admin.create-post');

    Route::get('admin/edit-post/{slug?}', 'Admin\AdminPostsController@edit')->name('admin.edit-post');

    Route::post('admin/edit-post/{slug?}', 'Admin\AdminPostsController@update')->name('admin.update-post');

    Route::post('admin/edit-post-delete-img/{slug}', 'Admin\AdminPostsController@deleteImg')->name('admin.deleteImg');


    Route::get('admin/edit-post/{slug?}/delete', 'Admin\AdminPostsController@delete')->name('admin.delete-post');


    //---------------------------------------------------------categories

    Route::get('admin/categories', 'Admin\AdminCategoriesController@index')->name('admin.categories');

    Route::get('admin/add-category', 'Admin\AdminCategoriesController@create_form');
    Route::post('admin/add-category', 'Admin\AdminCategoriesController@create')->name('admin.create-category');

});
