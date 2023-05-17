@extends('frontend.layouts.master',[
'bodyClass' => 'create'
])
@section('content')
<div class="form">
    <div class="container">
        <x-head-pages name="تعين كلمه المرور جديده" />
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
            <form action="{{ route('clients.password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="pin_code" class="form-control" placeholder="كود التحقق">
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="كلمة المرور الجديدة">
                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1"
                    placeholder=" تأكيد كلمة المرور الجديده">
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