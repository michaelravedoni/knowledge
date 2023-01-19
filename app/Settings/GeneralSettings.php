<?php

namespace app\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $name;
    public array $send_notifications_to;
    public string|null $password;
    public string|null $custom_scripts;
    public bool $block_robots;

    public string $primary;
    public string|null $favicon;
    public string|null $logo;

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
