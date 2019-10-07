<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $post = Post::where('id', '>', '0');
        if ($request->has('name')) {
            $post->where('name', 'like', '%' . $request->get('name') . '%');
        }
        if ($request->has('categories')) {
           $cats = $request->get('categories');
            $post->whereHas('categories',function($query) use ($cats){
                $query->whereIn('id', $cats);
            });
            
        }

        $categories = Category::get()->pluck('title', 'id');
        $posts = $post->get();
        return view('search.index')->with(['posts' => $posts, 'categories' => $categories]);
    }
}
