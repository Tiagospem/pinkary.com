<div class="mb-12 w-full text-slate-200">
    @if ($forYouQuestions->isEmpty())
        <section class="rounded-lg">
            <p class="my-8 text-center text-lg text-slate-500">
                Não encontramos nenhuma pergunta que possa lhe interessar com base na atividade que você realizou no Toplance.
            </p>
        </section>
    @else
        <section class="mb-12 min-h-screen space-y-10">
            @foreach ($forYouQuestions as $question)
                <livewire:questions.show
                    :questionId="$question->id"
                    :key="'question-' . $question->id"
                    :inIndex="true"
                    :pinnable="false"
                />
            @endforeach

            <x-load-more-button
                :perPage="$perPage"
                :paginator="$forYouQuestions"
                message="Não há mais perguntas para carregar, ou você rolou muito para baixo."
            />
        </section>
    @endif
</div>
