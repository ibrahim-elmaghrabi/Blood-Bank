@extends('frontend.layouts.master',[
'bodyClass' => 'create'
])
@section('content')
<div class="form">
    <div class="container">
        <x-head-pages name="استعاده كلمه المرور" />
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
            <form action="{{ route('clients-email.send') }}" method="POST">
                @csrf
                @method('PUT')
                <p>
                    تحقق من رسائل البريد الإلكتروني سوف يتم ارسال كود تحقق
                </p>
                <input type="text" name="email" value="{{ old('email') }}"
                        class="form-control" placeholder="البريد الالكتروني">
                <div class="create-btn">
                    <input type="submit" value="ارسال" />
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