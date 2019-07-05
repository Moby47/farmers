@component('mail::message')


Your Account on Dstreet has been Deactivated.

<p>Possible Reasons:</p>

<ol>
<li>Account Abuse</li>
<li>Excessive Valid Reports from Users</li>
<li>Admin Decision</li>
</ol>

<p>To Restore your Account, Kindly Contact Dstreet.</p>

@component('mail::button', ['url' => 'http://www.dstreet.com.ng'])
Contact Us
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
