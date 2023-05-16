<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:contacts-list', ['only' => ['index']]);
         $this->middleware('permission:contacts-show', ['only' => ['show']]);
         $this->middleware('permission:contacts-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contacts = Contact::paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('status', 'Message Deleted Successfully');
    }
}
