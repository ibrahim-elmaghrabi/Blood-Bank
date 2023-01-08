@extends('admin.layouts.master')
@section('main-pageName') Password   @endsection
@section('pageName')  Change  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password </h3>
              </div>
                {{ Form::open(['method'=> 'PUT', 'route'=> ['change-passwords.update', auth()->user()->id ]]) }}
                <div class="card-body">
                   <div class="form-group">
                    {{ Form::label('current_password' , 'Current Password') }}
                    {{ Form::password('current_password' , ['class' => 'form-control']) }}
                    @error('current_password')
                     <span class="bg-danger">  {{ $message }} </span>
                   @enderror
                  </div>
                  <div class="form-group">
                    {{ Form::label('new_password' , 'New Password') }}
                    {{ Form::password('password' , ['class' => 'form-control']) }}
                    @error('password')
                     <span class="bg-danger">  {{ $message }} </span>
                   @enderror
                  </div>
                  <div class="form-group">
                    {{ Form::label('password_confirmation' , 'New Password Confirmation') }}
                    {{ Form::password('password_confirmation' , ['class' => 'form-control']) }}
                    @error('password_confirmation')
                     <span class="bg-danger">  {{ $message }} </span>
                   @enderror
                  </div>
                  </div>
                </div>
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
 