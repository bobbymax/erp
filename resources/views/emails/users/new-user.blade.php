@component('mail::message')
# Welcome {{ $user->name }}

This portal was designed to create a seemless communication channel between staff and the ICT division for all your ICT related issues. You can login in with your official e-mail address annd your password is <span style="text-decoration: underline;"><strong>Password1</strong></span>.

Please ensure to update your profile with the necessary information as required.

@component('mail::button', ['url' => 'http://172.30.35.6/dashboard'])
Login Here
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
