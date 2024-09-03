<x-app-layout>
    <div class="mx-auto my-16 max-w-7xl px-6 lg:px-8">
        <a
            href="{{ route('about') }}"
            class="-mt-10 mb-12 flex items-center text-slate-400 hover:underline"
            wire:navigate
        >
            <x-icons.chevron-left class="size-4" />
            <span>Voltar</span>
        </a>

        <div class="mt-6">
            <div class="prose prose-slate prose-invert mx-auto max-w-4xl">
                <h1>Suporte</h1>
                <p><strong>Última Atualização: 02 de março de 2024</strong></p>

                <p>
                    Se você tiver alguma dúvida ou precisar de ajuda, sinta-se à vontade para entrar em contato conosco pelo e-mail
                    <a href="mailto:contato@leilotech.com.br">contato@leilotech.com.br</a>.
                </p>

            </div>
        </div>
    </div>
</x-app-layout>
