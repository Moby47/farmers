@component('mail::message')
 
<a href="{{route("sendEmailDone",["email" => $vmail,"verifytoken" =>$vcode])}}">
    Click Here To Verify Account
</a> 



Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
