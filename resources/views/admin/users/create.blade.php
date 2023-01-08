@extends('admin.layouts.master')
@inject('user' , 'App\Models\User' )
@section('main-pageName') Users   @endsection
@section('pageName')  ADD  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new User</h3>
              </div>
                {{ Form::model($user ,['route' => 'users.store' ]) }}
                  @include('admin.users.form')
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
 