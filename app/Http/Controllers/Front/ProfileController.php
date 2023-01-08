<?php

namespace App\Http\Controllers\Front;

use Hash;
use App\Models\City;
use App\Models\Client;
use App\Models\BloodType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client-web');
    }
    
    public function profile(Request $request, Client $client)
    {
        if ($request->user()->id !=  $client->id)
        {
            abort(403);
        }else{
            $bloodTypes = BloodType::all();
            $cities = City::all();
            return view(
                'frontend.profile',
                [
                    'bloodTypes' => $bloodTypes,
                    'cities' => $cities,
                    'client' => $client

                ]
            );
        }
    }

    public function updateProfile(Request $request, Client $client)
    {
   
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:clients,email,' . $client->id,
                'phone' => 'required|unique:clients,phone,' . $client->id,
                'd_o_b' => 'required',
                'blood_type_id' => 'required',
                'city_id' => 'required',
                'last_donation_date' => 'required',
            ]);
            $data['client_id'] = auth('client-web')->user()->id;
            $updatedClient = $client->update($data);
            if ($updatedClient) {
                return back()->with('status', 'Your Data Updated Successfully !');
            } else {
                return back()->with('status', 'an error happen please try again');
            }
        
    }

    public function changePassword(Request $request)
    {
        
            return view('frontend.change-password');
        }
        
    
    public function updatePassword(Request $request)
    {
         $data = $request->validate([
                'current_password' => 'required' ,
                'password' => 'required|confirmed|min:8'
            ]);
            if(!Hash::check($data['current_password'], auth('client-web')->user()->password)){
            
                return back()->with('status', 'Current password not correct');

            }else{
                $data['password'] = bcrypt($data['password']);
                $update = auth('client-web')->user()->update(['password' => $data['password'] ]);
                if($update){
                    return back()->with('status', 'Password Updated Successfully');
                }else{
                    return back()->with('status', 'Error Happen please try Again');
                }
            }
 
    }

    public function favoriteArticles(Request $request)
    {
        $clientPosts = auth()->guard('client-web')->user()->posts()->pluck('posts.id')->toArray();
        $client = auth()->guard('client-web')->user();
        $posts = $client->posts()->paginate(5);
        return view('frontend.favoriteArticles', ['posts' => $posts , 'clientPosts' =>  $clientPosts]);
         
    }

      
    
}
