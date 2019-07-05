@component('mail::message')
Congratulations!

Your School Was Successfully Changed to {{$school}}

@component('mail::button', ['url' => 'http://www.dstreet.com.ng/profile'])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
