@component('mail::message')
<p>New Post BY {{$poster}} In Your School</p>

@component('mail::button', ['url' => $newurl])
{{$ptitle}}
@endcomponent

@endcomponent
