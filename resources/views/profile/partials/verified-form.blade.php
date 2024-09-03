<section>
    <header>
        <h2 class="text-lg font-medium text-slate-400">
            <div class="items flex items-center space-x-3">
                <h2 class="text-lg font-medium text-slate-400">
                    {{ $user->is_verified ? __('Gerenciar o Selo de Verificado') : __('Verificar') }}
                </h2>
                <x-icons.verified
                    :color="$user->is_verified ? $user->right_color : 'gray'"
                    class="size-6"
                />
            </div>
        </h2>

        <div class="mt-2 text-sm text-slate-500">
            <span class="font-semibold">
                @if ($user->github_username === null && $user->is_verified === true)
                    Você é um usuário verificado. Você tem acesso ao selo de verificado.
                @else
                    Para obter o selo de verificado e mostrar aos outros que você é um usuário confiável, em contato com contato@leilotech.com.br.
                @endif
            </span>
        </div>
    </header>
</section>
