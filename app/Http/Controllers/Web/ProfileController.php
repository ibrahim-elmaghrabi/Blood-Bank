<?php

namespace App\Http\Controllers\Web;

use App\Models\{City, BloodType};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\ClientRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client-web');
    }

    public function edit(Request $request)
    {
        $client = auth('client-web')->user();
        $bloodTypes = BloodType::all();
        $cities = City::all();
        return view('frontend.profile', compact('bloodTypes', 'cities', 'client'));
    }

    public function update(ClientRequest $request)
    {
        $data = $request->validated();
        $updatedClient = auth('client-web')->user()->update($data);
        if ($updatedClient) {
            return back()->with('status', 'Your Data Updated Successfully !');
        } else {
            return back()->with('status', 'an error happen please try again');
        }
    }

    public function favoriteArticles(Request $request)
    {
        $clientPosts = auth()->guard('client-web')->user()->posts()->pluck('posts.id')->toArray();
        $client = auth()->guard('client-web')->user();
        $posts = $client->posts()->paginate(5);
        return view('frontend.favorite_articles', compact('posts', 'clientPosts'));
    }
}
