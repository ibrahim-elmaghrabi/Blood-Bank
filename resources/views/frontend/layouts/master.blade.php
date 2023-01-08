<!doctype html>
<html lang="en" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @include('frontend.layouts.head')
        <title>Blood Bank</title>
    </head>
    <body class="{{ $bodyClass ?? "" }}">
        <!--upper-bar-->
        @include('frontend.layouts.upper-bar')
        <!--nav-->
        @include('frontend.layouts.navbar')
        <x-flash-message />
       <!--- content --->
        @yield('content')
        <!-----footer---->
        @include('frontend.layouts.footer')
       <!---- scripts --->  
        @include('frontend.layouts.footer-scripts')
    </body>
</html>