<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->pluck('title', 'id');


        return view('posts.create')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field

        $userId = \Auth::id();
        $this->validate($request, [
            'name' => 'required|max:100',
            //'body' => 'required',
        ]);


        $data = $request->only('name');

        $data['image'] = '';
        $data['user_id'] = $userId;
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $data['image']  = $request->file('image')->move('images', $fileNameToStore);
        }
        $post = Post::create($data);
        $categories = $request['categories'];

        if (!empty($categories)) {
            $post->categories()->sync($categories);
        } else {
            $post->categories()->detach();
        }


        //Display a successful message upon save
        return redirect()->route('posts.index')
            ->with('flash_message', 'Article,
             ' . $post->name . ' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id); //Find post of id = $id


        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::get()->pluck('title', 'id');


        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            //'body' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $post->name = $request->input('name');
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $post->image = $request->file('image')->move('images', $fileNameToStore);
        }
        $categories = $request['categories'];

        if (!empty($categories)) {
            $post->categories()->sync($categories);
        } else {
            $post->categories()->detach();
        }



        $post->save();

        return redirect()->route(
            'posts.show',
            $post->id
        )->with(
            'flash_message',
            'Article, ' . $post->title . ' updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with(
                'flash_message',
                'Article successfully deleted'
            );
    }
}
