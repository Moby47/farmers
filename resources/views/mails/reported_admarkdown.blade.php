@component('mail::message')

<p>Your Advert <b>{{$titleadx}}</b> was deleted!</p>

<p>Possilble reason(s)</p>
<ol>
<li>Inappropriate Ad</li>
<li>Fraud </li>
<li>Duplicate Item </li>
</ol>

<p>If you think this is a mistake, please:</p>
@component('mail::button', ['url' => 'http://www.dstreet.com.ng'])
Contact us
@endcomponent


Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
