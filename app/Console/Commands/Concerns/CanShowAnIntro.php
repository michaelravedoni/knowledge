<?php

namespace App\Console\Commands\Concerns;

trait CanShowAnIntro
{
    protected function intro(string $type = 'installation'): void
    {
        $this->writeSeparationLine();
        $this->line($type === 'installation' ? 'Knowledge Installation' : 'Knowledge Upgrade');
        $this->line('Laravel version: ' . app()->version());
        $this->line('PHP version: ' . trim(phpversion()));
        $this->line(' ');
        $this->line('Github: https://github.com/michaelravedoni/knowledge');
        $this->writeSeparationLine();
        $this->line('');
    }

    protected function writeSeparationLine(): void
    {
        $this->info('*---------------------------------------------------------------------------*');
    }
}
