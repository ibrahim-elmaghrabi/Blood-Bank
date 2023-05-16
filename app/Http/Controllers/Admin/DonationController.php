<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;


class DonationController extends Controller
{

    public function __construct()
    {
         $this->middleware('permission:donations-list', ['only' => ['index']]);
         $this->middleware('permission:donations-show', ['only' => ['show']]);
         $this->middleware('permission:donations-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $donationRequests = DonationRequest::paginate(20);
        return view('admin.donations.index', compact('donationRequests'));
    }


    public function show($id)
    {
        $donationRequest = DonationRequest::findOrFail($id);
         return view('admin.donations.show', compact('donationRequest'));

    }

    public function destroy(DonationRequest $donationRequest)
    {
        $donationRequest->delete();
        return back()->with('status', 'Donation Deleted Successfully');
    }
}
