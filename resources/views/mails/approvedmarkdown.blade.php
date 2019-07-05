@component('mail::message')

Your Post <b>{{$post_title}}</b> has been approved!

@component('mail::button', ['url' => $url])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
