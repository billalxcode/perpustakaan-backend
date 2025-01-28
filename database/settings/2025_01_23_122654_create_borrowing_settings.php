<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('borrowing.borrowing_period', '14');
        $this->migrator->add('borrowing.borrowing_limit', '3');
        $this->migrator->add('borrowing.borrowing_fine', '1500');
    }
};
