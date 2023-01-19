<?php

namespace App\Console\Commands;

use App\Services\SystemChecker;
use Illuminate\Console\Command;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\VersionOutOfDate;

class VersionChecker extends Command
{
    protected $signature = 'knowledge:version';

    protected $description = 'Send emails when the knowledge software is outdated';

    public function handle(SystemChecker $systemChecker): int
    {
        if (!$systemChecker->isOutOfDate()) {
            return 0;
        }

        if (!$receivers = app(GeneralSettings::class)->send_notifications_to) {
            return 0;
        }

        foreach ($receivers as $receiver) {
            Mail::to($receiver['email'])->send(new VersionOutOfDate($receiver));
        }

        return 0;
    }
}
