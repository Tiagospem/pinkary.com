<?php

declare(strict_types=1);

use App\Mail\PendingNotifications;
use App\Models\Question;
use App\Models\User;

test('envelope', function () {
    $user = User::factory()->create();

    Question::factory()->create([
        'to_id' => $user->id,
    ]);

    $mail = new PendingNotifications($user);

    $envelope = $mail->envelope();

    expect($envelope->subject)
        ->toBe('TopNegocios: Você tem 1 notificação(oes)! - '.now()->format('d/m/Y'));
});
