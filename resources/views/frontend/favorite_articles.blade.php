@extends('frontend.layouts.master')
@section('content')
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
                    <div class='card'>
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
</script>
@endpush