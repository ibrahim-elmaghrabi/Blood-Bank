@extends('frontend.layouts.master',[
'bodyClass' => 'article-details'
])
@section('content')
<!--inside-article-->
<div class="inside-article">
    <div class="container">
        <x-head-pages name="المقالات" >
            <li class="breadcrumb-item active" aria-current="page">الوقاية من الأمراض</li>
        </x-head-pages>
        <div class="article-image">
            <img src="{{ asset('storage/'.$post->image) }}" alt="imagePost">
        </div>
        <div class="article-title col-12">
            <div class="h-text col-6">
                <h4>{{ $post->title }}</h4>
            </div>
            <div class="icon col-6">
                <button type="button">
                    <i id="{{ $post->id }}" onclick="toggleFavourite(this)" class="far fa-heart
                                {{ (in_array($post->id , $clientPosts)) ? 'redHeart' : 'whiteHeart' }}">
                    </i>
                </button>
            </div>
        </div>
        <!--text-->
        <div class="text">
            <p style="line-height: 2.5rem">{{ $post->content }}</p>
        </div>
        <!--articles-->
        <div class="articles">
            <div class="title">
                <div class="head-text">
                    <h2>مقالات ذات صلة</h2>
                </div>
            </div>
            <div class="view">
                <div class="row">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel articles-carousel">
                        @foreach ($posts as $post )
                        <div class='card'>
                            <div class="photo">
                                <img src="{{  asset('storage/'.$post->image) }}" class="card-img-top" alt="...">
                                <a href="{{ route('articles.show' , $post->id) }}" class="click">المزيد</a>
                            </div>
                            <div class="favourite">
                                <i id="{{ $post->id }}" onclick="toggleFavourite(this)" class="far fa-heart
                                         {{ (in_array($post->id , $clientPosts)) ? 'redHeart' : 'whiteHeart' }}">
                                </i>
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