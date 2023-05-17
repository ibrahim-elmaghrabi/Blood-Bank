<?php

namespace App\Http\Controllers\Web;

use App\Models\{Post, Category};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

class PostController extends Controller
{
    use HttpResponse;

    public function __construct()
    {
        $this->middleware('auth:client-web', ['only' => ['toggleFav']]);
    }

    public function index(Request $request)
    {
        if (auth()->guard('client-web')->check()) {
            $clientPosts = auth()->guard('client-web')->user()->posts()->pluck('posts.id')->toArray();
        } else {
            $clientPosts = [];
        }
        $posts = Post::where(function ($query) use ($request) {
            if ($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
            }
            if ($request->has('keyword')) {
                $query->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->keyword . '%');
                    $query->orWhere('content', 'like', '%' . $request->keyword . '%');
                });
            }
        })->paginate(3);
        $categories = Category::get();
        return view('frontend.articles', compact('posts', 'categories', 'clientPosts'));
    }

    public function show(Post $post)
    {
        if (auth()->guard('client-web')->check()) {
            $clientPosts = auth()->guard('client-web')->user()->posts()->pluck('posts.id')->toArray();
        } else {
            $clientPosts = [];
        }
        $posts = Post::latest()->take(5)->get();
        return view('frontend.article_details', compact('post', 'posts', 'clientPosts'));
    }
}
