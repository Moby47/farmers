@component('mail::message')

<p>Your Post <b>{{$post_title}}</b> was declined!</p>

<p>Possilble reason(s)</p>
<ol>
<li>Inappropriate post</li>
</ol>


<p>If you think this is a mistake, please:</p>
@component('mail::button', ['url' => 'http://www.dstreet.com.ng'])
Contact us
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
