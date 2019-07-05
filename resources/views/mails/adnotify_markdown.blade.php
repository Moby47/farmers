@component('mail::message')
<p>New Ad on Dstreet</p>


<ol>
<li><b>User:</b> {{$creator}}</li>
<li><b>Email:</b> {{$creatormail}} </li>
</ol>

@component('mail::button', ['url' => 'http://www.dstreet.com.ng/manage_ads'])
Take Action
@endcomponent

@endcomponent
