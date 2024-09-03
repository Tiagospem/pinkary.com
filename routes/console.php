<?php

declare(strict_types=1);

use App\Console\Commands\DeleteNonEmailVerifiedUsersCommand;
use App\Console\Commands\SendDailyEmailsCommand;
use App\Console\Commands\SendWeeklyEmailsCommand;
use App\Jobs\CleanUnusedUploadedImages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schedule;

Schedule::command(SendDailyEmailsCommand::class)->dailyAt('13:00');
Schedule::command(SendWeeklyEmailsCommand::class)->weeklyOn(Carbon::MONDAY, '13:00');
Schedule::command(DeleteNonEmailVerifiedUsersCommand::class)->hourly();
Schedule::job(CleanUnusedUploadedImages::class)->hourly();
