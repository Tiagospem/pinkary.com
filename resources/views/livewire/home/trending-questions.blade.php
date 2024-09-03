<div class="mb-12 w-full text-slate-200">
    @if ($trendingQuestions->isEmpty())
        <section class="rounded-lg">
            <p class="my-8 text-center text-lg text-slate-500">Atualmente, não há perguntas em tendência.</p>
        </section>
    @else
        <section class="mb-12 min-h-screen space-y-10">
            @foreach ($trendingQuestions as $question)
                <livewire:questions.show
                    :questionId="$question->id"
                    :key="'question-' . $question->id"
                    :inIndex="true"
                    :pinnable="false"
                    :trending="true"
                />
            @endforeach

            <x-load-more-button
                :perPage="$perPage"
                :paginator="$trendingQuestions"
                message="TNão há mais perguntas para carregar ou você rolou muito para baixo."
            />
        </section>
    @endif
</div>
