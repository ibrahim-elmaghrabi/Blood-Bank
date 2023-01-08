    <div class="card-body">
        <div class="form-group">
            {{   Form::label('name', 'Governorate Name') }}
            {{   Form::text('name',old('name'),['class' => 'form-control']) }}
            @error('name')
                <span class="bg-danger">  {{ $message }} </span>
            @enderror
        </div>
    </div>
</div>
<div class="card-footer">
     {{ Form::submit('submit',['class' => 'btn btn-primary']) }}
</div>