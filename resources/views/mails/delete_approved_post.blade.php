@component('mail::message')

<p>Your Post <b>{{$title}}</b> was deleted!</p>

<p>Possilble reason(s)</p>
<ol>
<li>{{$report}}</li>
</ol>


<p>If you think this is a mistake, please:</p>
@component('mail::button', ['url' => 'http://www.dstreet.com.ng'])
Contact us
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
