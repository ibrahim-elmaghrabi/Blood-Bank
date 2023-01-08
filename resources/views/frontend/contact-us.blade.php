@extends('frontend.layouts.master',[
    'bodyClass' => 'contact-us'
])
@inject('settings','App\Models\Setting')
@section('content')
<div class="contact-now">
    <div class="container">
            <x-head-pages name="تواصل معنا" />
        <div class="row methods">
            <div class="col-md-6">
                <div class="call">
                    <div class="title">
                        <h4>اتصل بنا</h4>
                    </div>
                    <div class="content">
                        <div class="logo">
                            <img src="{{ asset('images/logo.png') }} " alt="logo">
                        </div>
                        <div class="details">
                            <ul>
                                <li><span>الجوال:</span>{{ $setting->phone }}</li>
                                <li><span>فاكس:</span>{{ $setting->fax }}</li>
                                <li><span>البريد الإلكترونى:</span>{{ $setting->email }}</li>
                            </ul>
                        </div>
                        <div class="social">
                            <h4>تواصل معنا</h4>
                            <div class="icons" dir="ltr">
                                <div class="out-icon">
                                    <a href="{{ $setting->fd_link }}">
                                        <img src="{{  asset('images/001-facebook.svg') }}" alt="facebbookLink">
                                    </a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $setting->tw_link }}">
                                        <img src="{{ asset('images/002-twitter.svg') }}" alt="twitterLink">
                                    </a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $setting->yt_link }}">
                                        <img src="{{ asset('images/003-youtube.svg') }}" alt="youTubeLink">
                                    </a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $setting->insta_link }}">
                                        <img src="{{ asset('images/004-instagram.svg') }}" alt="instagramLink">
                                    </a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $setting->wta_link }}">
                                        <img src="{{ asset('images/005-whatsapp.svg') }}" alt="wattsAppLink">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <div class="title">
                        <h4>تواصل معنا</h4>
                    </div>
                    <div class="fields">
                        {{ Form::open(['route' => 'messages.store' ]) }}
                            {{ Form::text('name',old('name'),
                                ['class'=> 'form-control', 'placeholder'=> 'الإسم'] ) }}
                            {{ Form::email('email',old('email'),
                                ['class'=> 'form-control', 'placeholder'=>'البريد الإلكترونى' ] ) }}
                            {{ Form::text('phone',old('phone'),
                                ['class'=> 'form-control', 'placeholder'=> 'الجوال'] ) }}
                            {{ Form::text('subject',old('subject'),
                                ['class'=> 'form-control', 'placeholder'=> 'عنوان الرسالة'] ) }}
                            {{ Form::textarea('message',old('message'),
                                ['class'=> 'form-control', 'placeholder'=> 'نص الرسالة'] ) }}
                            {{ Form::submit('ارسال') }}
                        {{ Form::Close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
   integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
        integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k"
        crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="{{  asset('js/main.js') }} "></script>
@endpush