@component('mail::message')
Hi {{ $firstname }},

Change your password and you can continue.

To change your Izytech CMS password, click here

@component('mail::button', ['url' => $url])
reset password
@endcomponent 

or paste the following link into your browser:

{{ $url }}

This link will expire in 24 hours, be sure to use it soon.

Thank you for using IzyTech CMS!

<br>

The IzyTech CMS team

@endcomponent
