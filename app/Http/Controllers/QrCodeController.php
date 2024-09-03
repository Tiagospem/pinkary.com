<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
use Symfony\Component\HttpFoundation\StreamedResponse;

final readonly class QrCodeController
{
    /**
     * Generate a QR code for the user.
     */
    public function __invoke(Request $request): StreamedResponse
    {
        $user = type($request->user())->as(User::class);

        /** @var Generator $qrCodeGenerator */
        $qrCodeGenerator = QrCode::getFacadeRoot();

        $qrCode = $qrCodeGenerator
            ->size(512)
            ->format('png')
            ->backgroundColor(3, 7, 18, 100)
            ->color(255, 165, 0, 100)
            ->merge('/public/apple-touch-icon.png')
            ->errorCorrection('M')
            ->generate(route('profile.show', [
                'username' => $user->username,
            ]));

        return response()->streamDownload(
            function () use ($qrCode): void {
                /** @var string $qrCode */
                echo $qrCode;
            },
            'toplance_'.$user->username.'.png',
            ['Content-Type' => 'image/png']
        );
    }
}
