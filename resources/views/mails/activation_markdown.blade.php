@component('mail::message')
Congratulations!

Your Account on Dstreet has been Activated.

@component('mail::button', ['url' => 'http://www.dstreet.com.ng/login'])
Enter Dstreet
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
