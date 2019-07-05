@component('mail::message')

Your Advert <b>{{$title_ad}}</b> has been Approved!

@component('mail::button', ['url' => $url_ad])
View Now
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
