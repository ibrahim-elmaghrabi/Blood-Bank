<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;


class DonationController extends Controller
{
     
    public function __construct()
    {
         $this->middleware('permission:donation-list' , ['only' => ['index']] );
         $this->middleware('permission:donation-show' , ['only' => ['show']]);
         $this->middleware('permission:donation-delete',['only' => ['destroy']] );
        
    }
    public function index()
    {
        $donationRequests = DonationRequest::paginate(20);
        return view('admin.donations.index', ['donationRequests' => $donationRequests]);
    }


    public function show($id)
    {
         return view('admin.donations.show', [
            'donationRequest' => DonationRequest::findOrFail($id)
        ]);

    }
     
    public function destroy(DonationRequest $donationRequest)
    {
        $donationRequest->delete();
        return back()->with('status', 'Donation Deleted Successfully');
    }
}
