<x-mail::message>
    # Olá, {{ $user->name }}!

    Notamos que você tem {{ $pendingNotificationsCount }} {{ Str::plural('notificação', $pendingNotificationsCount) }}. Você pode visualizar as notificações clicando no botão abaixo.

    <x-mail::button :url="route('notifications.index')">
        Ver Notificações
    </x-mail::button>

    Se você não quiser mais receber esses e-mails, pode alterar seu "Tempo de Preferência de E-mail" nas [configurações do perfil]({{ route('profile.edit') }}).

    Até logo,<br>
    {{ config('app.name') }}

</x-mail::message>
