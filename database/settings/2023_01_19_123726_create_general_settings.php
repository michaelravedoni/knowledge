<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', config('app.name'));
        $this->migrator->add('general.company_name', null);
        $this->migrator->add('general.company_url', null);
        $this->migrator->add('general.color_primary', '#2563EB');
        $this->migrator->add('general.favicon', null);
        $this->migrator->add('general.logo', null);
        $this->migrator->add('general.privacy_url', null);
        $this->migrator->add('general.terms_url', null);
        $this->migrator->add('general.statuspage_url', null);
        $this->migrator->add('general.enable_hc', null);
        $this->migrator->add('general.enable_statuspage', null);
        $this->migrator->add('general.enable_announcements', null);
        $this->migrator->add('general.enable_user_report', null);
        $this->migrator->add('general.enable_roadmap', null);

        $this->migrator->add('general.send_notifications_to', []);
        $this->migrator->add('general.password', null);
        $this->migrator->add('general.custom_scripts', null);
        $this->migrator->add('general.block_robots', false);
    }
}
