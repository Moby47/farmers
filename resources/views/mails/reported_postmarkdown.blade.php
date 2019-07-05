@component('mail::message')

<p>Your Post <b>{{$titlepost}}</b> was deleted!</p>

<p>Possilble reason(s)</p>
<ol>
<li>Inappropriate Post</li>
<li>Fraud </li>
<li>Duplicate Item </li>
</ol>

<p> <a href='http://www.dstreet.com.ng/post'>Create a New Post</a> </p>

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
