<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ContactRequest;

class ContactUsController extends Controller
{

    public function create()
    {
        return view('frontend.contact_us');
    }

    public function store(ContactRequest $request)
    {
        $data = $request->validated();
        Contact::create($data);
        return back()->with('status', 'تم ارسال الرسالة بنجاح سوف نتواصل معكم قريبا');
    }

}
