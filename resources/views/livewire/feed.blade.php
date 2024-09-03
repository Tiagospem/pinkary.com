<div>
    <section class="mb-12 min-h-screen space-y-10">
        @forelse ($questions as $question)
            <livewire:questions.show
                :questionId="$question->id"
                :key="'question-' . $question->id"
                :inIndex="true"
            />
        @empty
            <div class="text-center text-slate-400">Não há perguntas para exibir.</div>
        @endforelse

        <x-load-more-button
            :perPage="$perPage"
            :paginator="$questions"
            message="Não há mais perguntas para carregar, ou você rolou para longe demais."
        />
    </section>
</div>
