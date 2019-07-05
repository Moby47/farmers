@component('mail::message')
Congratulations!

Your Account has been verified.

@component('mail::button', ['url' => 'www.dstreet.com.ng'])
Enter Dstreet
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
