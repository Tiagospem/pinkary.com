<section>
    <header>
        <h2 class="text-lg font-medium text-slate-400">
            {{ __('Alterar senha') }}
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            {{ __('Certifique-se de que sua conta esteja usando uma senha longa e aleatória para manter a segurança.') }}
        </p>
    </header>

    <form
        method="post"
        action="{{ route('password.update') }}"
        class="mt-6 space-y-6"
    >
        @csrf
        @method('put')

        <div>
            <x-input-label
                for="update_password_current_password"
                :value="__('Senha atual')"
            />
            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="current-password"
            />
            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />
        </div>

        <div>
            <x-input-label
                for="update_password_password"
                :value="__('Nova senha')"
            />
            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />
            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />
        </div>

        <div>
            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Confirme a senha')"
            />
            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />
            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</section>
