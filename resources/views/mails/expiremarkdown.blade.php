@component('mail::message')

<p>Your Advert <b>{{$ad_title}}</b> has expired!</p>


<p>Please visit our Website to renew:</p>
@component('mail::button', ['url' => 'http://www.dstreet.com.ng/ads'])
Dstreet Online
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
