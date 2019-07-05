@component('mail::message')
Congratulations!!

You have been registered as an Admin on Dstreet.


Your login details:

Email: {{$mail}}
Password: {{$pass}}

@component('mail::button', ['url' => 'http://www.dstreet.com.ng/login'])
Login now
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
