@component('mail::message')

Olá, {{ $post->user->fullName }} , o usuário {{ . $user->fullName }} comentou em seu post {{ $post->title }}

@component('mail::button', ['url' => $url])
    Visitar post
@endcomponent

@endcomponent
