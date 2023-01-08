<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Category;

class PostController extends Controller
{
    use HttpResponse;

     public function categories()
    {
        return CategoryResource::collection(Category::all());
    }

     public function posts(Request $request)
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
        return PostResource::collection($posts);
    }


    public function post(Post $post)
    {
        return  new PostResource($post);
    }

    public function toggleFavorite(Request $request, Post $post)
    {
        $toggle =  $request->user()->posts()->toggle($post->id);
        return $this->apiResponse(1, 'Success', $toggle);
    }

    public function favorites(Request $request)
    {
        $posts = $request->user()->posts()->latest()->paginate(5);
        return PostResource::collection($posts);
        
    }
}
