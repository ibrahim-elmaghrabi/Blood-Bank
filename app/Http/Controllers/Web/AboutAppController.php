<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AboutAppController extends Controller
{
    public function __invoke()
    {
        return view('frontend.about_blood_bank');
    }
}
