@extends('frontend.layouts.master',[
'bodyClass' => 'inside-request'
])
@section('content')
<div class="ask-donation">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="donation-requests.html">طلبات التبرع</a></li>
                    <li class="breadcrumb-item active" aria-current="page">طلب التبرع: احمد محمد</li>
                </ol>
            </nav>
        </div>
        <div class="details">
            <div class="person">
                <div class="row">
                    <div class="col-md-6">
                        <div class="inside">
                            <div class="info">
                                <div class="dark">
                                    <p>الإسم</p>
                                </div>
                                <div class="light">
                                        <p>{{ $donationRequest->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inside">
                            <div class="info">
                                <div class="dark">
                                    <p>فصيلة الدم</p>
                                </div>
                                <div class="light">
                                    <p dir="ltr">{{ $donationRequest->bloodType->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="inside">
                            <div class="info">
                                <div class="dark">
                                    <p>العمر</p>
                                </div>
                                <div class="light">
                                    <p>{{ $donationRequest->age }} عام</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inside">
                            <div class="info">
                                <div class="dark">
                                    <p>عدد الأكياس المطلوبة</p>
                                </div>
                                <div class="light">
                                    <p>{{ $donationRequest->bags_num }} أكياس</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="inside">
                            <div class="info">
                                <div class="dark">
                                    <p>المشفى</p>
                                </div>
                                <div class="light">
                                        <p>{{ $donationRequest->hospital_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inside">
                            <div class="info">
                                <div class="dark">
                                    <p>رقم الجوال</p>
                                </div>
                                <div class="light">
                                    <p>{{ $donationRequest->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="inside">
                            <div class="info">
                                <div class="special-dark dark">
                                    <p>عنوان المشفى</p>
                                </div>
                                <div class="special-light light">
                                        {{ $donationRequest->hospital_address }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="details-button">
                    <a  href="#">التفاصيل</a>
                </div>
            </div>
            <div class="text">
                <p>
                    {{ $donationRequest->details }}
                </p>
            </div>
            <div class="location">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3418.0770797767814!2d31.409187284906096!3d31.051953681527007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79db9d4d56311%3A0x69ad97566dc9bd76!2z2YXYs9iq2LTZgdmJINin2YTYrtmK2LE!5e0!3m2!1sar!2seg!4v1597910005047!5m2!1sar!2seg"
                    height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
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
 
        
       
        
     
      