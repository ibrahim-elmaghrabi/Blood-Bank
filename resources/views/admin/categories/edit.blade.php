@extends('admin.layouts.master')
@section('main-pageName') Categories   @endsection
@section('pageName')  Edit  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit<strong> {{ $category->name }}</strong> category</h3>
              </div>
              {{ Form::model($category , ['method'=> 'PUT' , 'route' => ['categories.update' , $category->id] ]) }}
                @include('admin.categories.form')
                <div class="card-footer">
                  {{ Form::submit('Update',['class' => 'btn btn-primary']) }}
                </div>
              {{   Form::close()   }}
            </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
 