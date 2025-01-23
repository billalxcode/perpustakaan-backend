<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.primary_theme_color', 'rgb(34, 197, 94)');
        $this->migrator->add('general.locale', 'en');
    }
};
