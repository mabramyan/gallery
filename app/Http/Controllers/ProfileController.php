<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = \Auth::id();

        $posts = Post::where(['user_id'=>$userId])->get();


        return view('posts.index')->with(['posts'=>$posts]);
    }
}
