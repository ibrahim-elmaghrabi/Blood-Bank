<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

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
        return view('admin.posts.index', ['posts' => $posts]);
    }
 
    public function create()
    {
        $select = Category::pluck('name', 'id');
        return view('admin.posts.create' , compact('select'));
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required',
            'content'     => 'required',
            'image'       => 'required',
            'category_id' => 'required'
        ]);
        $data['image'] = $request->file('image')->store('posts', 'public');
        Post::create($data) ;
        return redirect()->route('posts.index')->with('status', 'Post Created Successfully');
    }

    
    public function edit(Post $post)
    {
        $select = Category::pluck('name', 'id');
        return view('admin.posts.edit', ['post' => $post , 'select' => $select ]);
    }

    
    public function update(Request $request, Post $post)
    {
         $data = $request->validate([
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required'
        ]);
        if($request->hasFile('image')){
              $data['image'] = $request->file('image')->store('posts', 'public');
        }
        $post->update($data);
        return redirect()->route('posts.index')->with('status', 'Post Updated Successfully');
    }

    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'Post Deleted Successfully');
    }
}
