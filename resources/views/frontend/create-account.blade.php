@extends('frontend.layouts.master',[
'bodyClass' => 'create'
])
@section('content')
<div class="form">
    <div class="container">
            <x-head-pages name="انشاء حساب جديد" />
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
            <form action="{{ route('account.store')  }}" method="POST">
                @csrf
                <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control"  placeholder="الإسم">
                <input type="email"  name="email" value="{{ old('email') }}"
                        class="form-control"  placeholder="البريد الإلكترونى">
                <input type="text" name="d_o_b" value="{{ old('d_o_b') }}" placeholder="تاريخ الميلاد"
                        class="form-control"  onfocus="(this.type='date')" id="date">
                <select class="form-control"  name="blood_type_id">
                    <option selected disabled hidden value=""> فصيلة الدم</option>
                    @foreach ($bloodTypes as $bloodType )
                        <option value="{{ $bloodType->id }}"
                            {{ old('blood_type_id') == $bloodType->id ? 'selected' : '' }}>
                                {{ $bloodType->name }}
                        </option>
                    @endforeach
                </select>
                <select id="governorate-dd" class="form-control"  name="governorate_id">
                    <option selected disabled hidden >المحافظة</option>
                    @foreach ($governorates as $governorate )
                        <option value="{{ $governorate->id }}">
                            {{ $governorate->name }}
                        </option>
                    @endforeach
                </select>
                <select id="city-dd" class="form-control" name="city_id"></select>
                <input type="text" name="phone" value="{{ old('phone') }}"
                            class="form-control"  placeholder="رقم الهاتف">
                <input type="text"  name="last_donation_date" value="{{ old('last_donation_date') }}"
                        placeholder="آخر تاريخ تبرع" class="form-control" onfocus="(this.type='date')"
                                id="date">
                <input type="password" name="password"
                        class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                <input type="password" name="password_confirmation"
                        class="form-control" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور">
                <div class="create-btn">
                    <input type="submit" value="إنشاء" />
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
<script type="text/javascript">
    $(document).ready(function() {
    $('#governorate-dd').change(function(event){
        var idGovernorate = this.value;
        $('#city-dd').html('');
        $.ajax({
            'url': '/fetchCity',
            'type': 'POST' ,
            'dataType': 'json' ,
            'data': {governorate_id:idGovernorate , _token:"{{ csrf_token() }}"},
            success: function(response){
                $('#city-dd').html('<option value="">المدينة</option>');
                $.each(response.cities,function(index ,val ){
                $('#city-dd').append('<option value="'+val.id+'">'+val.name+'</option>')
                });
            }
        })
    });
});
</script>
@endpush