@extends('admin.layouts.master')
@section('main-pageName')  Post  @endsection
@section('pageName')  Edit  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit<strong> {{ $post->title }} </strong></h3>
              </div>
                {{ Form::model($post,
                      ['method' => 'PUT', 'route' => ['posts.update' , $post->id], 'files' => true]
                      ) }}
                 @include('admin.posts.form')
                <div class="card-footer">
                  {{ Form::submit('Update',['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
 