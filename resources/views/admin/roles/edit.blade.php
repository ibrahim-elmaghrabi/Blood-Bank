@extends('admin.layouts.master')
@section('main-pageName') Usres Roles   @endsection
@section('pageName')  Edit  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit<strong> {{ $role->name }}</strong> Role</h3>
              </div>
                {{ Form::model($role , ['method' => 'PUT' , 'route' => ['roles.update' , $role->id ] ]) }}
                  @include('admin.roles.form')
                  <div class="card-footer">
                    {{ Form::submit('Update' , ['class' => 'btn btn-primary']) }}
                  </div>
                {{ Form::close() }}
             </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
 