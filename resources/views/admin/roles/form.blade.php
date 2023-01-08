<div class="card-body">
  <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name' , old('name') , ['class' => 'form-control']) }}
    @error('name')
      <span class="bg-danger">  {{ $message }} </span>
    @enderror
  </div>
    <div class="form-group">
      {{ Form::label('permission' , 'Permissions') }}
        @error('permission_list')
          <span class="bg-danger">  {{ $message }} </span>
      @enderror
      <br>
      <input id="selectAll" type="checkbox">  <label for='selectAll'>Select All</label>
      <div class="row">
        @foreach ($permissions as $permission )
          <div class="col-sm-3">
            <div class="checkbox">
              {{ Form::checkbox('permission_list[]',
                    $permission->id , $role->hasPermissionTo($permission->name) ? 'checked' : null ) }}
              {{ Form::label('permission',$permission->name ) }}
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>