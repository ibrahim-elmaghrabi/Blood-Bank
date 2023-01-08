@extends('frontend.layouts.master',[
'bodyClass' => 'create'
])
@section('content')
<div class="form">
    <div class="container">
        <x-head-pages name="الحساب الشخصي" />
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <div>
                <div class="mt-5">
                    <a  href="{{ route('profile.articles') }}"
                        style="background-color: #2d3e50;color:#fff"
                        class="account-login">المقالات المفضله
                        <i class="fa-solid fa-heart" style="color: red"></i>
                    </a>
                </div>
            </div>
            <div class="account-form">
                <form action="{{ route('profile.update',$client->id )}}" method="POST">
                    @csrf
                @method('PUT')
                    <input type="text" name="name" value="{{ $client->name }}" class="form-control" placeholder="الإسم">
                    <input type="email" name="email" value="{{ $client->email }}" class="form-control"
                        placeholder="البريد الإلكترونى">
                    <input type="text" name="d_o_b" value="{{ $client->d_o_b }}" placeholder="تاريخ الميلاد"
                        class="form-control" onfocus="(this.type='date')" id="date">
                    <select class="form-control" name="blood_type_id">
                        <option selected disabled hidden value=""> فصيلة الدم</option>
                        @foreach ($bloodTypes as $bloodType )
                        <option value="{{ $bloodType->id }}"
                            {{ $client->blood_type_id == $bloodType->id ? 'selected' : ''}}>
                                {{ $bloodType->name }}
                        </option>
                        @endforeach
                    </select>
                    <select class="js-example-basic-single form-control" name="city_id">
                        <option selected disabled hidden value="">المدينة</option>
                    @foreach($cities as $city)
                            <option value="{{ $city->id }}"
                                {{ $client->city_id == $city->id ? 'selected' : '' }}>
                                     {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" name="phone" value="{{ $client->phone }}" class="form-control"
                        placeholder="رقم الهاتف">
                    <input type="text" name="last_donation_date" value="{{ $client->last_donation_date }}"
                        placeholder="آخر تاريخ تبرع" class="form-control" onfocus="(this.type='date')" id="date">
                    <div class="row buttons">
                        <div class="col-md-6 left">
                            <input type="submit" value="تعديل" />
                            <a class="m-4" href="{{ route('profile-password.update') }}">تغير كلمه المرور</a>
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
<script src="{{ asset('js/main.js') }}"></script>
 <script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    });
 </script>
@endpush