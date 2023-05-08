<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client-web', ['only' => 'toggleFav']);
    }

    public function home(Request $request)
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

        return view('frontend.index', [
            'posts' => $posts,
            'donations' => $donations,
            'bloodTypes' => $bloodTypes,
            'cities' => $cities,
            'clientPosts' => $clientPosts,
        ]);
    }

    public function toggleFav(Request $request)
    {
        $client = auth()->guard('client-web')->user();
        $toggle = $client->posts()->toggle($request->post_id);
        return $this->apiResponse(1, 'Success', $toggle);
    }

    public function aboutUs()
    {
        return view('frontend.who-are-us');
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function settings()
    {
        $settings = Setting::all();
        return view('frontend.contact-us', ['settings' => $settings]);
    }

    public function ClientMessage(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        Contact::create($data);
        return back()->with('status', 'تم ارسال الرسالة بنجاح سوف نتواصل معكم قريبا');
    }

    public function aboutApp()
    {
        return view('frontend.aboutBloodBank');
    }
}
