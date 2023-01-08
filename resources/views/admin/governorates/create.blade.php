@extends('admin.layouts.master')
@section('main-pageName') Governorate   @endsection
@section('pageName')  Create  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Governorate</h3>
              </div>
              {{   Form::open(['route' => 'governorates.store' ])   }}}
               @include('admin.governorates.form')
              {{   Form::close()   }}
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
 