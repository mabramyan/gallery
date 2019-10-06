<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name', 'image', 'user_id'
    ];



    public function categories()
    {

        return $this->belongsToMany('App\Models\Category','category_post');

    }

}
