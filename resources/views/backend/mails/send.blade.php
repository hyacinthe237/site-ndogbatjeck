@component('mail::message')
Bonjour {{ $user->firstname }},

Votre compte a été créé dans IzyTech CMS.

Votre mot de passe par défaut est : <h1>pass</h1>

Bien vouloir l'utiliser pour accéder à votre compte.

Merci d'utiliser IzyTech CMS!

<br>

Equipe IzyTech CMS

@endcomponent
