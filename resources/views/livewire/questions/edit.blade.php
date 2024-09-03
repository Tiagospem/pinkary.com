<div class="border-l border-slate-900">
    <form wire:submit="update">
        <div class="mt-4 flex items-center justify-between">
            <div class="w-full">
                <div class="mb-1">
                    <label
                        for="{{ 'answer_question_'.$question->id }}"
                        class="sr-only"
                        >Answer</label
                    >

                    <textarea
                        id="{{ 'answer_question_'.$question->id }}"
                        wire:model="answer"
                        x-autosize
                        class="h-24 w-full resize-none border-none border-transparent bg-transparent text-white focus:border-transparent focus:outline-0 focus:ring-0"
                        placeholder="Digite algo..."
                        maxlength="1000"
                        rows="3"
                    ></textarea>

                    <p class="text-right text-xs text-slate-400"><span x-text="$wire.answer.length"></span> / 1000</p>

                    @error('answer')
                        <x-input-error
                            :messages="$message"
                            class="mt-2"
                        />
                    @enderror
                </div>
                <div class="flex items-center justify-between gap-4">
                    <div class="items center ml-2 flex gap-4">
                        <x-primary-colorless-button
                            class="text-{{ $user->left_color }} border-{{ $user->left_color }}"
                            type="submit"
                        >
                            {{ __('Enviar') }}
                        </x-primary-colorless-button>
                        @if (! $question->is_reported)
                            @if (! $question->answer)
                                <button
                                    wire:click.prevent="ignore"
                                    wire:confirm="Are you sure you want to ignore this question?"
                                    class="text-slate-400 hover:text-slate-500 focus:outline-none"
                                >
                                    Ignorar
                                </button>
                                <button
                                    wire:click.prevent="report"
                                    wire:confirm="Are you sure you want to report this question?"
                                    class="text-slate-400 hover:text-red-500 focus:outline-none"
                                >
                                    Reportar
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
