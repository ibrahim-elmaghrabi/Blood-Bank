    <div class="card-body">
        <div class="form-group">
            {{ Form::label('name' , 'City Name') }}
            {{ Form::text('name' , old('name') ,['class' => 'form-control'] ) }}
            @error('name')
            <span class="bg-danger">  {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('governorate' , 'Governorate') }}
            {{ Form::select('governorate_id', $select, null, ['class'=>'form-control']) }}
            @error('governorate_id')
            <span class="bg-danger"> the governorate field is required </span>
            @enderror
        </div>
    </div>
    </div>
</div>