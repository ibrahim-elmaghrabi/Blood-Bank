<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::where(function ($query) use ($request) {
            if ($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
            }

            if ($request->has('keyword')) {
                $query->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%'.$request->keyword.'%');
                    $query->orWhere('content', 'like', '%'.$request->keyword.'%');
                });
            }
        })->get();
        return $this->success(message: 'success', data:PostResource::collection($posts));
    }

    public function show(Post $post)
    {
        return $this->success(message: 'Success', data: PostResource::make($post));
    }

    public function toggleFavorite(Request $request, Post $post)
    {
        $request->user()->posts()->toggle($post->id);
        return $this->apiResponse(message: 'liked');
    }

    public function favorites()
    {
        $posts = request()->user()->posts()->latest()->paginate(10);
        return $this->success(message: 'success', data: PostResource::collection($posts));
    }
}
