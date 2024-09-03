<div>
    <form wire:submit="update">
        <div class="mt-12">
            <label class="text-base font-semibold text-slate-500">Formato do Link</label>
            <p class="text-sm text-slate-500">Em qual formato você deseja apresentar seus links?</p>
            <fieldset class="mt-4">
                <legend class="sr-only">Formato dos links</legend>
                <div class="flex space-x-4">
                    @foreach (['rounded-none' => 'Square', 'rounded-lg' => 'Round', 'rounded-full' => 'Extra Round'] as $shape => $label)
                        <div class="flex items-center">
                            <input
                                id="{{ strtolower($shape) }}"
                                wire:model="link_shape"
                                x-model="link_shape"
                                type="radio"
                                value="{{ $shape }}"
                                class="text-{{ $user->left_color }} focus:ring-{{ $user->left_color }} h-4 w-4 border-slate-300"
                            />

                            <label
                                for="{{ strtolower($shape) }}"
                                class="ml-3 block text-sm font-medium leading-6 text-slate-500"
                            >
                                {{ $label }}
                            </label>
                        </div>
                    @endforeach

                    @error('link_shape')
                        <x-input-error
                            :messages="$message"
                            class="mt-2"
                        />
                    @enderror
                </div>
            </fieldset>
        </div>

        <div class="mt-12">
            <label class="text-base font-semibold text-slate-500">Cor dos links</label>
            <p class="text-sm text-slate-500">Qual cor você está escolhendo para seus links?</p>
            <fieldset class="mt-4">
                <legend class="sr-only">Cor dos links</legend>
                <div class="space-y-4">
                    @foreach ([
                                  'from-blue-500 to-teal-700',
                                  'from-red-500 to-orange-600',
                                  'from-blue-500 to-purple-600',
                                  'from-orange-500 to-orange-500',
                                  'from-indigo-500 to-lime-700',
                                  'from-yellow-600 to-blue-600',
                              ] as $gradient)
                        <div class="flex justify-between">
                            <input
                                class="text-{{ $user->left_color }} focus:ring-{{ $user->left_color }} mr-3 mt-2 border-slate-300"
                                type="radio"
                                wire:model="gradient"
                                x-model="gradient"
                                name="gradient"
                                id="{{ $gradient }}"
                                value="{{ $gradient }}"
                            />
                            <label
                                for="{{ $gradient }}"
                                class="{{ $gradient }} from-indigo-400_ to-blue-500_ relative block w-full cursor-pointer rounded-lg border bg-white bg-gradient-to-r px-6 py-4 shadow-sm focus:outline-none sm:flex sm:justify-between"
                            >
                                <span
                                    class="border-orange-600__ pointer-events-none absolute -inset-px rounded-lg border-2"
                                    aria-hidden="true"
                                ></span>
                            </label>
                        </div>
                    @endforeach

                    @error('gradient')
                        <x-input-error
                            :messages="$message"
                            class="mt-2"
                        />
                    @enderror
                </div>
            </fieldset>
        </div>

        <div class="mt-6 flex items-center gap-4">
            <x-primary-colorless-button
                class="text-{{ $user->left_color }} border-{{ $user->left_color }}"
                type="submit"
            >
                {{ __('Salvar') }}
            </x-primary-colorless-button>
            <button
                x-on:click="showSettingsForm = false"
                type="button"
                class="text-slate-400 hover:text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Cancelar
            </button>
        </div>
    </form>
</div>
