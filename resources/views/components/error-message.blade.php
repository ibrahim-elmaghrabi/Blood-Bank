@if(session()->has('error'))
    <font color="red">{{ session('error') }}</font>
@endif