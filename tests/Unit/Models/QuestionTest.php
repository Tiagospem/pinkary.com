<?php

declare(strict_types=1);

use App\Models\Hashtag;
use App\Models\Like;
use App\Models\Question;
use App\Models\User;

test('content', function () {
    $question = Question::factory()->create([
        'content' => 'Hello https://example.com, how are you? https://example.com',
    ])->fresh();

    expect($question->content)->toBe('Hello <a data-navigate-ignore="true" class="text-blue-500 hover:underline hover:text-blue-700 cursor-pointer" target="_blank" href="https://example.com">example.com</a>, how are you? <a data-navigate-ignore="true" class="text-blue-500 hover:underline hover:text-blue-700 cursor-pointer" target="_blank" href="https://example.com">example.com</a>');
});

test('relations', function () {
    $question = Question::factory()
        ->hasHashtags(1)
        ->create();

    $question->likes()->saveMany(Like::factory()->count(3)->make());

    expect($question->from)->toBeInstanceOf(User::class)
        ->and($question->to)->toBeInstanceOf(User::class)
        ->and($question->likes)->each->toBeInstanceOf(Like::class)
        ->and($question->hashtags)->each->toBeInstanceOf(Hashtag::class);
});

test('mentions', function () {
    User::factory()->create(['username' => 'firstuser']);
    User::factory()->create(['username' => 'seconduser']);

    $question = Question::factory()->create([
        'content' => 'Hello @firstuser! How are you doing?',
        'answer' => 'I am doing fine, @seconduser! @invaliduser is not doing well.',
    ]);

    expect($question->mentions()->count())->toBe(2)
        ->and($question->mentions()->first()->username)->toBe('firstuser')
        ->and($question->mentions()->last()->username)->toBe('seconduser');
});

test('mentions when there is no answer', function () {
    User::factory()->create(['username' => 'firstuser']);
    User::factory()->create(['username' => 'seconduser']);

    $question = Question::factory()->create([
        'content' => 'Hello @firstuser! How are you doing?',
        'answer' => null,
    ]);

    expect($question->mentions()->count())->toBe(0);
});

test('increment views', function () {
    $question = Question::factory()->create([
        'answer' => 'Hello',
        'views' => 0,
    ]);

    Question::incrementViews([$question->id]);

    expect($question->fresh()->views)->toBe(1);
});

test('does not increment views without answer', function () {
    $question = Question::factory()->create([
        'answer' => null,
        'views' => 0,
    ]);

    Question::incrementViews([$question->id]);

    expect($question->fresh()->views)->toBe(0);
});
