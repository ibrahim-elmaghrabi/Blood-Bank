@extends('admin.layouts.master')
@inject('role','Spatie\Permission\Models\Role' )
@section('main-pageName') Role   @endsection
@section('pageName')  Add  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Role</h3>
              </div>
                {{ Form::open(['route' => 'roles.store']) }}
                  @include('admin.roles.form')
                  <div class="card-footer">
                    {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
                  </div>
                {{ Form::close() }}
            </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
@push('scripts')
<script>
  $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
});
</script>
@endpush