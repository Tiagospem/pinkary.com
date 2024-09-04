<x-guest-layout>
    <div class="mb-4 text-sm text-slate-400">
        {{ __('Obrigado por se inscrever! Antes de começar, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Se você não recebeu o e-mail, ficaremos felizes em enviar outro.') }}
    </div>

    <div class="mb-4 text-sm text-slate-400">
        {{ __('As contas precisam ser verificadas antes de serem usadas. Contas não verificadas serão automaticamente deletadas após 24 horas.') }}
    </div>

    <div class="mt-4 flex items-center justify-between">
        <form
            method="POST"
            action="{{ route('verification.send') }}"
        >
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Reenviar E-mail de Verificação') }}
                </x-primary-button>
            </div>
        </form>

        <form
            method="POST"
            action="{{ route('logout') }}"
        >
            @csrf

            <button
                type="submit"
                class="rounded-md text-sm text-slate-400 underline hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                {{ __('Sair') }}
            </button>
        </form>
    </div>
</x-guest-layout>
