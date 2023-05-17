@extends('frontend.layouts.master', ['bodyClass'=> 'create'])
@section('content')
<!--form-->
<div class="form">
    <div class="container">
        <x-head-pages name="تغير كلمه المرور" />
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="account-form">
            <form action="{{ route('client-password.update' , auth('client-web')->user()->id )  }}" method="POST">
                @csrf
                @method('PUT')
                <input type="password" name="current_password"
                    class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور الحالية">
                <input type="password" name="password"
                    class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور الجديدة">
                <input type="password" name="password_confirmation"
                    class="form-control" id="exampleInputPassword1" placeholder=" تأكيد كلمة المرور الجديده">
                <div class="create-btn">
                    <input type="submit" value="تعديل" />
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
<script src="{{ asset('js/main.js') }}"></script>
@endpush
