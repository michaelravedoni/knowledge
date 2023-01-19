<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VersionOutOfDate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $receiver
    ) {
    }

    public function build(): self
    {
        return $this
            ->to($this->receiver['email'], $this->receiver['name'])
            ->subject('There is a new version of the knowledge software')
            ->markdown('emails.admin.knowledge-version-out-of-date');
    }
}
