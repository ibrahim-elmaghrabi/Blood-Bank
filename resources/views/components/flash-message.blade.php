@if(session()->has('status'))
<div x-data="{show:true }" x-init="setTimeout(()=> show = false , 3000)" x-show="show" class="text-center bg-success">
    <p>{{ session('status') }}</p>
</div>
@endif