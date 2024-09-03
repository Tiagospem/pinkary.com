<x-guest-layout>
    <div class="mb-4 text-sm text-slate-400">
        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e nós lhe enviaremos um link para redefinir a senha que permitirá que você escolha uma nova.') }}
    </div>

    <form
        method="POST"
        action="{{ route('password.email') }}"
    >
        @csrf

        <div>
            <x-input-label
                for="email"
                :value="__('E-mail')"
            />
            <x-text-input
                id="email"
                class="mt-1 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
            />
            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button>
                {{ __('Redefinir') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
