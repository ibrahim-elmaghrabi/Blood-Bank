 <div class="card-body">
    <div class="form-group">
        {{ Form::label('name' , 'Name') }}
        {{ Form::text('name' , old('name') ,['class' => 'form-control']) }}
        @error('name')
            <span class="bg-danger">  {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label('email' , 'Email') }}
        {{ Form::email('email' , old('email') , ['class' => 'form-control']) }}
        @error('email')
            <span class="bg-danger">  {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label('password' , 'Password') }}
        {{ Form::password('password' , ['class' => 'form-control']) }}
        @error('password')
            <span class="bg-danger">  {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation' , 'Password Confirmation ') }}
        {{ Form::password('password_confirmation' , ['class' => 'form-control']) }}
        @error('password_confirmation')
            <span class="bg-danger">  {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label('roles', 'Roles') }}
        <div class="row">
        @foreach ($roles as $role )
            <div class="col-sm-3">
                <div class="checkbox">
                    {{ Form::checkbox('roles_list[]' , $role->id , $user->hasRole($role->name) ? 'checked' : null ) }}
                    {{ Form::label('role' , $role->name) }}
                </div>
            </div>
        @endforeach
        </div>
        @error('permission_list')
            <span class="bg-danger">  {{ $message }} </span>
        @enderror
    </div>
  </div>
</div>
