<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.name', config('app.name'));
        $this->migrator->add('general.send_notifications_to', []);
        $this->migrator->add('general.password', null);
        $this->migrator->add('general.custom_scripts', null);
        $this->migrator->add('general.block_robots', false);
        $this->migrator->add('general.primary', '#2563EB');
        $this->migrator->add('general.favicon', null);
        $this->migrator->add('general.logo', null);
    }
}
