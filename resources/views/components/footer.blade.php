<footer class="border-t border-gray-800">
    <div class="mx-auto max-w-7xl overflow-hidden px-6 py-16 sm:py-18 lg:px-8">
        <nav
            class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12"
            aria-label="Footer"
        >
            <div class="pb-6">
                <a
                    href="{{ route('changelog') }}"
                    class="text-sm leading-6 text-slate-400 hover:text-slate-200"
                    >Changelog</a
                >
            </div>
            <div class="pb-6">
                <a
                    href="{{ route('terms') }}"
                    class="text-sm leading-6 text-slate-400 hover:text-slate-200"
                    >Termos</a
                >
            </div>
            <div class="pb-6">
                <a
                    href="{{ route('privacy') }}"
                    class="text-sm leading-6 text-slate-400 hover:text-slate-200"
                    >Politica de Privacidade</a
                >
            </div>
            <div class="pb-6">
                <a
                    href="{{ route('support') }}"
                    class="text-sm leading-6 text-slate-400 hover:text-slate-200"
                    >Suporte</a
                >
            </div>
        </nav>

{{--        <div class="mt-10 flex space-x-10 sm:justify-center">--}}
{{--            <a--}}
{{--                href="https://twitter.com/PinkaryProject"--}}
{{--                target="_blank"--}}
{{--                class="text-slate-400 hover:text-slate-200"--}}
{{--            >--}}
{{--                <span class="sr-only">X</span>--}}

{{--                <x-icons.twitter-x class="h-6 w-6" />--}}
{{--            </a>--}}

{{--            <a--}}
{{--                href="#"--}}
{{--                target="_blank"--}}
{{--                class="text-slate-400 hover:text-slate-200"--}}
{{--            >--}}
{{--                <span class="sr-only">GitHub</span>--}}

{{--                <x-icons.github class="h-6 w-6" />--}}
{{--            </a>--}}
{{--        </div>--}}

        <p class="mt-4 text-xs leading-5 text-slate-400 sm:text-center">&copy; {{ date('Y') }} {{ config('app.name') }}.</p>
    </div>
</footer>
