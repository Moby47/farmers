@component('mail::message')
 
<a href="{{route("sendEmailDone",["email" => $user->email,"verifytoken" =>$user->verifytoken])}}">
    Click Here To Verify Your Dstreet Account
</a> 



Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
