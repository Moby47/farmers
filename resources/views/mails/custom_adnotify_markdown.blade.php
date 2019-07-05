@component('mail::message')
<p>New Custom Ad Request on Dstreet</p>


<ol>
<li><b>User:</b> {{$creator2}}</li>
<li><b>Email:</b> {{$creatormail2}} </li>
</ol>

@component('mail::button', ['url' => 'http://www.dstreet.com.ng/custom_ads'])
Take Action
@endcomponent

@endcomponent
