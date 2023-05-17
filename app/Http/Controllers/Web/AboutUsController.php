<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function __invoke()
    {
        return view('frontend.who_are_us');
    }
}
