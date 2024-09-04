<?php

declare(strict_types=1);

use App\Models\User;

it('guest', function () {
    $response = $this->get('/about');

    $response
        ->assertOk()
        ->assertSee('TopNegocios')
        ->assertSee('Um Link. Todas as Suas Redes Sociais.');
});

it('auth', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/about');

    $response
        ->assertOk()
        ->assertSee('TopNegocios')
        ->assertSee('Um Link. Todas as Suas Redes Sociais.');
});

it('displays login button', function () {
    $response = $this->get('/about');

    $response
        ->assertOk()
        ->assertSee('Log In')
        ->assertDontSee('Your Profile');
});

it('displays "Your Profile" when logged in', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/about');

    $response
        ->assertOk()
        ->assertSee('Seu perfil')
        ->assertDontSee('Log In');
});

it('displays terms of service and privacy policy', function () {
    $response = $this->get('/about');

    $response
        ->assertOk()
        ->assertSee('Termos')
        ->assertSee('Politica de Privacidade')
        ->assertSee('Suporte');
});
