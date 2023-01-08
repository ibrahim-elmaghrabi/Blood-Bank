@extends('admin.layouts.master')
@push('css')
<link rel="stylesheet" href="{{  asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{  asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@section('main-pageName')   Cities   @endsection
@section('pageName')  Edit  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit City</h3>
              </div>
                {{ Form::model($city , ['method' => 'PUT' , 'route' => ['cities.update' ,$city->id ] ]) }}
                 @include('admin.cities.form')
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
 