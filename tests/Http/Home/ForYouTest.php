<?php

declare(strict_types=1);

use App\Jobs\IncrementViews;
use App\Livewire\Home\QuestionsForYou;
use App\Models\User;

it('can see the "for you" view', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('home.for_you'));

    $response->assertOk()
        ->assertSee('For you')
        ->assertSeeLivewire(QuestionsForYou::class);
});

it('guest can see the "for you" view', function () {
    $response = $this->get(route('home.for_you'));

    $response->assertOk()
        ->assertSee('Faça login ou crie uma conta para acessar conteúdo personalizado.');
});

it('does increment views', function () {
    Queue::fake(IncrementViews::class);

    $this->actingAs(User::factory()->create());
    $this->get(route('home.for_you'));

    Queue::assertPushed(IncrementViews::class);
});
