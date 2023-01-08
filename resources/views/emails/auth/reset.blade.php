<x-mail::message>
# Introduction
Blood Bank Rest Passsword
<p>
hello {{ $user->name }}
</p>
<p>Your reset code is : {{ $user->pin_code }}</p>
   

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
