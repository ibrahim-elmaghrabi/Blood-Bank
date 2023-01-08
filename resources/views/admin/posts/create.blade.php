@extends('admin.layouts.master')
@section('main-pageName')  Post  @endsection
@section('pageName')  Create  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Post</h3>
              </div>
                {{ Form::open(['route' => 'posts.store' ,  'files' => true]) }}
                 @include('admin.posts.form')
                <div class="card-footer">
                  {{ Form::submit('Add' , ['class' => 'btn btn-primary']) }}
                </div>
               {{ Form::close() }}
            </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
