<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->with('categories')->get();
        
        return view('admin.dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $cats = Category::all();
        $categories = array();
        foreach($cats as $c) {
            $categories[$c->id] = $c->name;
        }
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title,'-');
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save(); //to get a post id
        
        $post->categories()->sync($request->get('categories'));
        $post->save();
        
        return redirect()->route('admin.index')->with('flash.message', 'Success!')->with('flash.type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            $post = Post::where('slug', $id)->first();
        }
        
        if (!$post) {
            abort(404);
        }
        
        return view('front.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cats = Category::all();
        $categories = array();
        foreach($cats as $c) {
            $categories[$c->id] = $c->name;
        }
        
        return view('admin.posts.edit', compact('post', 'categories'));
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
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.index')->with('flash.message', 'Post not found!')->with('flash.type', 'error');
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->categories()->sync($request->get('categories'));
        $post->user_id = Auth::user()->id;
        
        $post->save();
        
        return redirect()->route('admin.index')->with('flash.message', 'Success!')->with('flash.type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo 'Delete '.$id;
    }
}
