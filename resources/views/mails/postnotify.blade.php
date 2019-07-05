@component('mail::message')
<p>New Post on Dstreet</p>


<ol>
<li><b>User:</b> {{$poster}}</li>
<li><b>School:</b> {{$postersch}} </li>
<li><b>Email:</b> {{$postermailer}} </li>
</ol>

@component('mail::button', ['url' => 'http://www.dstreet.com.ng/admin-manage-post'])
Take Action
@endcomponent

@endcomponent
