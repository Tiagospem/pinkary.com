<x-guest-layout>
    @section('head')
        <script
            async
            src="https://www.google.com/recaptcha/api.js"
        ></script>
    @endsection

    <form
        method="POST"
        action="{{ route('register') }}"
    >
        @csrf

        <div>
            <x-input-label
                for="name"
                :value="__('Nome')"
            />
            <x-text-input
                id="name"
                class="mt-1 block w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2"
            />
        </div>

        <div class="mt-4">
            <x-input-label
                for="username"
                :value="__('Apelido')"
            />
            <x-text-input
                id="username"
                class="mt-1 block w-full"
                type="text"
                name="username"
                :value="old('username')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error
                :messages="$errors->get('username')"
                class="mt-2"
            />
        </div>

        <div class="mt-4">
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
                autocomplete="email"
            />
            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <div class="mt-4">
            <x-input-label
                for="password"
                :value="__('Senha')"
            />

            <x-text-input
                id="password"
                class="mt-1 block w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <div class="mt-4">
            <x-input-label
                for="password_confirmation"
                :value="__('Confirme a senha')"
            />

            <x-text-input
                id="password_confirmation"
                class="mt-1 block w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <div class="mt-4">
            <div class="flex items-center">
                <input
                    id="terms"
                    name="terms"
                    type="checkbox"
                    class="mr-2 h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-600"
                />

                <x-input-label for="terms">
                    Ao se inscrever, eu confirmo que tenho pelo menos 18 anos e aceito os Termos e Condições e a Política de Privacidade.
                    <a
                        target="_blank"
                        href="{{ route('terms') }}"
                        class="text-orange-500 underline hover:no-underline"
                        >Termos de Serviço</a
                    >
                    e
                    <a
                        href="{{ route('privacy') }}"
                        class="text-orange-500 underline hover:no-underline"
                        >Politica de Privacidade</a
                    >.
                </x-input-label>
            </div>

            <x-input-error
                :messages="$errors->get('terms')"
                class="mt-2"
            />
        </div>

        <div
            class="g-recaptcha mt-4"
            data-sitekey="{{ config('services.recaptcha.key') }}"
            data-theme="dark"
        ></div>

        @if ($errors->has('g-recaptcha-response'))
            <x-input-error
                :messages="'The reCAPTCHA is required.'"
                class="mt-2"
            />
        @endif

        <div class="mt-4 flex items-center justify-end space-x-3.5 text-sm">
            <div>
                <span class="text-slate-500">Já possui um cadastro?</span>

                <a
                    class="rounded-md text-sm text-slate-200 underline hover:no-underline focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2"
                    href="{{ route('login') }}"
                    wire:navigate
                >
                    {{ __(' Entre aqui') }}
                </a>
            </div>

            <x-primary-button>
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
