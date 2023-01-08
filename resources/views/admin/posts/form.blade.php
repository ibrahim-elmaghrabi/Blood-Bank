<div class="card-body">
    <div class="form-group">
        {{ Form::label('title' , 'Title') }}
        {{ Form::text('title' , old('title') , ['class' => 'form-control']) }}
        @error('title')
            <span class="bg-danger">  {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label('content','Content' ) }}
        {{ Form::textarea('content',old('content') , ['class' => 'form-control'] ) }}
        @error('content')
            <span class="bg-danger">  {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label('categories' , 'Categories') }}
        {{ Form::select('category_id',$select , null , ['class' =>'form-control select2' ] ) }}
        @error('category_id')
        <span class="bg-danger"> the Category field is required </span>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label('image', 'Post Image')}}
        {{ Form::file('image') }}
        @error('image')
            <span class="bg-danger">  {{ $message }} </span>
        @enderror
    </div>
 </div>
</div>