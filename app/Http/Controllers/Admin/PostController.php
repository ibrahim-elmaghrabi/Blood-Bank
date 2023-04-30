<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;

class PostController extends Controller
{

    public function __construct()
    {
         $this->middleware('permission:post-list' , ['only' => ['index']] );
         $this->middleware('permission:post-create' , ['only' => ['create' , 'store']] );
         $this->middleware('permission:post-edit' , ['only' => ['edit' , 'update']] );
         $this->middleware('permission:post-delete' , ['only' => ['destroy']] );
    }

    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $select = Category::pluck('name', 'id');
        return view('admin.posts.create', compact('select'));
    }

    public function store(PostRequest $request)
    {
        $request['image'] = $request->file('image')->store('posts', 'public');
        Post::create($request->validated()) ;
        return redirect()->route('posts.index')->with('status', 'Post Created Successfully');
    }

    public function edit(Post $post)
    {
        $select = Category::pluck('name', 'id');
        return view('admin.posts.edit', compact('post', 'select' ));
    }

    public function update(PostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
              $data['image'] = $request->file('image')->store('posts', 'public');
        }
        $post->update($request->validated());
        return redirect()->route('posts.index')->with('status', 'Post Updated Successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'Post Deleted Successfully');
    }
}
