@extends('frontend.layouts.master',[
'bodyClass' => 'who-are-us'
])
@inject('settings','App\Models\Setting')
@section('content')
<!--inside-article-->
<div class="about-us">
    <div class="container">
        <x-head-pages name="عن بنك الدم" />
        <div class="details">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
            <div class="text">
                @foreach ($settings->all() as $setting )
                <p class="fs-1">{{Str::substr($setting->who_we_are, 0, 200) }}</p>
                <p class="fs-1">{{Str::substr($setting->who_we_are, 200, 350) }}</p>
                <p class="fs-1">{{Str::substr($setting->who_we_are,350, ) }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
    integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous">
</script>
<script src="{{  asset('js/main.js') }}"></script>
@endpush