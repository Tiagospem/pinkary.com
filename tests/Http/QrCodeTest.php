<?php

declare(strict_types=1);

use App\Models\User;

test('can QR Code be downloaded only by authenticated users', function () {
    $response = $this->get(route('qr-code.image'));

    $response->assertRedirect(route('login'));
});

test('user can download qr code', function () {
    $user = User::factory()->create();

    $qrCode = QrCode::size(512)
        ->format('png')
        ->backgroundColor(3, 7, 18, 100)
        ->color(255, 165, 0, 100)
        ->merge('/public/apple-touch-icon.png')
        ->errorCorrection('M')
        ->generate(route('profile.show', [
            'username' => $user->username,
        ]));

    $response = $this->actingAs($user)->get(route('qr-code.image'));

    $response
        ->assertOk()
        ->assertStreamedContent($qrCode->toHtml())
        ->assertHeader('content-type', 'image/png')
        ->assertDownload('toplance_'.$user->username.'.png');
});
