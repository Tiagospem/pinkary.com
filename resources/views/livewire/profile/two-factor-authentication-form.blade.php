<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-slate-400">
            {{ __('Autenticação de dois fatores') }}
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            {{ __('Adicione segurança adicional à sua conta usando a autenticação de dois fatores.') }}
        </p>
    </header>

    <section>
        <h3 class="text-lg font-medium text-slate-300">
            @if ($enabled)
                @if ($showingConfirmation)
                    {{ __('Conclua a ativação da autenticação de dois fatores.') }}
                @else
                    {{ __('Você ativou a autenticação de dois fatores.') }}
                @endif
            @else
                {{ __('Você não ativou a autenticação de dois fatores.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-slate-500">
            <p>
                {{ __('Quando a autenticação de dois fatores estiver ativada, você será solicitado a fornecer um token seguro e aleatório durante a autenticação. Você pode recuperar esse token no aplicativo Google Authenticator do seu telefone.') }}
            </p>
        </div>

        @if ($enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-slate-500">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('Para concluir a ativação da autenticação de dois fatores, escaneie o código QR a seguir usando o aplicativo autenticador do seu telefone ou insira a chave de configuração e forneça o código OTP gerado.') }}
                        @else
                            {{ __('A autenticação de dois fatores está agora ativada. Escaneie o código QR a seguir usando o aplicativo autenticador do seu telefone ou insira a chave de configuração.') }}
                        @endif
                    </p>
                </div>
                <div class="mt-4 p-2 inline-block bg-white">
                    {!! $user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-slate-500">
                    <p class="font-semibold">
                        {{ __('Setup Key') }}: {{ decrypt($user->two_factor_secret) }}
                    </p>
                </div>
            @endif
            @if ($showingConfirmation)
                <div class="mt-4">
                    <x-input-label for="code" value="{{ __('Code') }}" />

                    <x-text-input id="code" type="text" name="code" class="block mt-1 w-1/2"
                        inputmode="numeric" autofocus autocomplete="one-time-code" wire:model="code"
                        wire:keydown.enter="confirmTwoFactorAuthentication" />

                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-slate-500">
                    <p class="font-semibold">
                        {{ __('Armazene esses códigos de recuperação em um gerenciador de senhas seguro. Eles podem ser usados para recuperar o acesso à sua conta caso seu dispositivo de autenticação de dois fatores seja perdido.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-900 text-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (!$enabled)
                <x-primary-button type="button" wire:loading.attr="disabled"
                    wire:click="enableTwoFactorAuthentication">
                    {{ __('Habilitar') }}
                </x-primary-button>
            @else
                @if ($showingRecoveryCodes)
                    <x-secondary-button class="me-3" wire:click="regenerateRecoveryCodes">
                        {{ __('Regenerar Códigos de Recuperação') }}
                    </x-secondary-button>
                @elseif($showingConfirmation)
                    <x-secondary-button class="me-3" wire:click="confirmTwoFactorAuthentication">
                        {{ __('Confirmar') }}
                    </x-secondary-button>
                @else
                    <x-secondary-button class="me-3" wire:click="showRecoveryCodes">
                        {{ __('Mostrar Códigos de Recuperação') }}
                    </x-secondary-button>
                @endif

                <x-danger-button type="button" wire:loading.attr="disabled"
                    wire:click="disableTwoFactorAuthentication">
                    @if ($showingConfirmation)
                        {{ __('Cancelar') }}
                    @else
                        {{ __('Desabilitar') }}
                    @endif
                </x-danger-button>
            @endif
        </div>
    </section>
    <livewire:auth.confirm-password />
</section>
