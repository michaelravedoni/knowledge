<?php

namespace app\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string|null $company_name;
    public string|null $company_url;
    public string|null $color_primary;
    public string|null $favicon;
    public string|null $logo;
    public string|null $privacy_url;
    public string|null $terms_url;
    public string|null $statuspage_url;
    public bool|null $enable_hc;
    public bool|null $enable_statuspage;
    public bool|null $enable_announcements;
    public bool|null $enable_user_report;
    public bool|null $enable_roadmap;

    public array $send_notifications_to;
    public string|null $password;
    public string|null $custom_scripts;
    public bool $block_robots;

    public static function group(): string
    {
        return 'general';
    }

    public static function encrypted(): array
    {
        return [
            'password'
        ];
    }
}
