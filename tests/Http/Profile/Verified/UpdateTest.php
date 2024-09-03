<?php

declare(strict_types=1);

test('guest', function () {
    $response = $this->post(route('profile.verified.update'));

    $response->assertStatus(302)
        ->assertRedirect(route('login'));
});
