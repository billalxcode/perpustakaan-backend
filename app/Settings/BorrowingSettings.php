<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BorrowingSettings extends Settings
{
    public string $borrowing_period;

    public string $borrowing_limit;

    public string $borrowing_fine;

    public static function group(): string
    {
        return 'borrowing';
    }
}
