<div>
    <x-modal
        name="confirm-password"
        maxWidth="sm"
    >
    <div class="p-6 rounded-lg shadow sm:p-8">
        <div class="mb-4 text-sm text-slate-400">
            {{ __('Esta é uma área segura da aplicação. Por favor, confirme sua senha antes de continuar.') }}
        </div>

        <form
            wire:submit='confirm'
        >
            <div>
                <x-input-label
                    for="password"
                    :value="__('Senha')"
                />

                <x-text-input
                    id="password"
                    class="mt-1 block w-full"
                    type="password"
                    name="password"
                    wire:model="password"
                    required
                    autocomplete="current-password"
                />

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />
            </div>

            <div class="mt-4 flex justify-end">
                <x-primary-button>
                    {{ __('confirmar') }}
                </x-primary-button>
                <x-secondary-button
                    type="button"
                    x-on:click="$dispatch('close-modal', 'confirm-password')"
                    class="ml-2"
                >
                    {{ __('Cancelar') }}
                </x-secondary-button>
            </div>
        </form>
    </div>
    </x-modal>
</div>
