@extends('frontend.layouts.master')
@section('content')
<!--intro-->
<div class="intro">
    <div id="slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item carousel-1 active">
                <div class="container info">
                    <div class="col-lg-5">
                        <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص. 
                        </p>
                        <a href="#">المزيد</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-2">
                <div class="container info">
                    <div class="col-lg-5">
                        <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص. 
                        </p>
                        <a href="#">المزيد</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-3">
                <div class="container info">
                    <div class="col-lg-5">
                        <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي. 
                        </p>
                        <a href="#">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--about-->
<div class="about">
    <div class="container">
        <div class="col-lg-6 text-center">
            <p>
                <span>بنك الدم</span> هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ.
            </p>
        </div>
    </div>
</div>

<!--articles-->
<div class="articles">
    <div class="container title">
        <div class="head-text">
            <h2>المقالات</h2>
        </div>
    </div>
    <div class="view">
        <div class="container">
            <div class="row">
                <!-- Set up your HTML -->
                <div class="owl-carousel articles-carousel">
                    @foreach ($posts as $post )
                        <div class = 'card'>
                            <div class="photo">
                                <img src="{{  asset('storage/'.$post->image) }}" class="card-img-top" alt="...">
                                <a href="{{ route('articles.show' , $post->id) }}" class="click">المزيد</a>
                            </div>
                            <div class="favourite">
                                <i id="{{ $post->id }}" onclick="toggleFavourite(this)" class="far fa-heart
                                    {{ (in_array($post->id , $clientPosts)) ? 'redHeart' : 'whiteHeart' }}"></i>
                            </div>
                        
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">
                                    {{ Str::substr($post->content, 0, 200).' ...........' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="requests">
    <div class="container">
        <div class="head-text">
            <h2>طلبات التبرع</h2>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <form action="" method="GET" class="row filter">
                <x-blood-types :bloodTypes="$bloodTypes" />
                    <x-cities :cities="$cities" />
                <div class="col-md-1 search">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <div class="patients">
                @foreach ($donations as $donation )
                    <x-donation :donation="$donation" />
                @endforeach
            </div>
            <div class="more">
                <a href="{{ route('donationRequests.index') }}">المزيد</a>
            </div>
        </div>
    </div>
</div>
<div class="contact">
    <div class="container">
        <div class="col-md-7">
            <div class="title">
                <h3>اتصل بنا</h3>
            </div>
            <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
            <div class="row whatsapp">
                <a href="{{ $setting->phone }}">
                    <img src="{{ asset('images/whats.png') }}" alt="wattsApp">
                    <p dir="ltr">{{ $setting->phone }}</p>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="app">
    <div class="container">
        <div class="row">
            <div class="info col-md-6">
                <h3>تطبيق بنك الدم</h3>
                <p>
                    {{ $setting->about_app }}
                </p>
                <div class="download">
                    <h4>متوفر على</h4>
                    <div class="row stores">
                            <x-store-links  class="col-sm-6" />
                    </div>
                </div>
            </div>
            <div class="screens col-md-6">
                <img src="images/App.png" alt="appImage">
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
 <script>
    function toggleFavourite(heart){
        var post_id = heart.id ;
        $.ajax({
            url : '{{ route('toggle-fav') }}' ,
            type: 'post' ,
            data: {_token:"{{ csrf_token() }}" , post_id:post_id },
            success:function(data){
                if(data.status == 1 ){
                    var currentClass = $(heart).attr('class');
                    if(currentClass.includes('whiteHeart')){
                        $(heart).removeClass('whiteHeart').addClass('redHeart');
                    }else{
                        $(heart).removeClass('redHeart').addClass('whiteHeart');
                    }
                }
                
            }
        });
    }

    $('#city').on('change' , function(){

    });
</script>
@endpush