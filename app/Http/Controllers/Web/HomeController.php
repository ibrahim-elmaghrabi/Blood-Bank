<?php

namespace App\Http\Controllers\Web;

use App\Models\{Post, BloodType, City};
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client-web', ['only' => 'toggleFav']);
    }

    public function index(Request $request)
    {
        if (auth()->guard('client-web')->check()) {
            $clientPosts = auth()->guard('client-web')->user()->posts()->pluck('posts.id')->toArray();
        } else {
            $clientPosts = [];
        }
        $posts = Post::take(4)->get();
        $donations = DonationRequest::where(function ($query) use ($request) {
            // filter by gov whereHas
            if ($request->has('city_id')) {
                $query->where('city_id', $request->city_id);
            }
            if ($request->has('blood_type_id')) {
                $query->where('blood_type_id', $request->blood_type_id);
            }
        })->take(8)->get();
        $bloodTypes = BloodType::all();
        $cities = City::all();

        return view('frontend.index', compact('posts', 'donations', 'bloodTypes', 'cities', 'clientPosts'));
    }

    public function toggleFav(Request $request)
    {
        $client = auth()->guard('client-web')->user();
        $toggle = $client->posts()->toggle($request->post_id);
        return $this->apiResponse(1, 'Success', $toggle);
    }


    // public function settings()
    // {
    //     $settings = Setting::all();
    //     return view('frontend.contact-us', ['settings' => $settings]);
    // }



}
