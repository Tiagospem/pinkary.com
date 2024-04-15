<?php

declare(strict_types=1);

namespace App\Livewire\Home;

use App\Livewire\Concerns\HasLoadMore;
use App\Jobs\IncrementViews;
use App\Models\User;
use App\Queries\Feeds\QuestionsForYouFeed;
use Illuminate\View\View;
use Livewire\Component;

final class QuestionsForYou extends Component
{
    use HasLoadMore;

    /**
     * Renders the component.
     */
    public function render(): View
    {
        $user = type(auth()->user())->as(User::class);

        $questions = (new QuestionsForYouFeed($user))->builder()->simplePaginate($this->perPage);

        /* @phpstan-ignore-next-line */
        dispatch(IncrementViews::of($questions->getCollection()));

        return view('livewire.home.questions-for-you', [
            'forYouQuestions' => $questions,
        ]);
    }
}
