@extends('frontend.layouts.master',[
'bodyClass' => 'signin-account'
])
@section('content')
<div class="form">
    <div class="container">
        <x-head-pages name="تسجيل الدخول" />
        <div class="signin-form">
            <form action="{{ route('clients-web.login') }}" method="POST">
                @csrf
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="الجوال">
                    @error('phone')<font color="red">{{ $message }}</font>@enderror
                    <x-error-message />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                    @error('password')<font color="red">{{ $message }}</font>@enderror
                </div>
                <div class="row options">
                    <div class="col-md-6 remember">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                        </div>
                    </div>
                    <div class="col-md-6 forgot">
                        <img src="{{ asset('images/complain.png') }}" alt="forgetLogo">
                        <a href="{{ route('clients.reset') }}">هل نسيت كلمة المرور</a>
                    </div>
                </div>
                <div class="row buttons">
                    <div class="col-md-6 right">
                        <button type="submit" class="account-login">الدخول</button>
                    </div>
                    <div class="col-md-6 left">
                        <a href="{{ route('account.create') }}">انشاء حساب جديد</a>
                    </div>
                </div>
            </form>
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