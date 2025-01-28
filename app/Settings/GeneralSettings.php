<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $primary_theme_color;

    public string $locale;

    public static function group(): string
    {
        return 'general';
    }
}
