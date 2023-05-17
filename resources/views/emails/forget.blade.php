@component('mail::message')

Hello {{$user->name}}
 

<p>We Understand it happens</p>
@component('mail::button', ['url'=>url('reset/'.$user->remember_token)])
Reset Your PassWord
@endcomponent
 <p> Incase you have any issues recovering your password, Please contact us
Thanks,<br>
{{ config('app.name') }}
@endcomponent