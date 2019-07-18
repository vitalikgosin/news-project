<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    public $table = "categories";
    //use SoftDeletes;

//    public function user()
//    {
//        // https://laravel.com/docs/5.7/eloquent-relationships#defining-relationships
//        return $this->belongsTo(User::class, 'author_id', 'id');
//    }


}
