<?php

namespace App\Filament\Pages;

use App\Settings\BorrowingSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageBorrowing extends SettingsPage
{
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = BorrowingSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Borrowing Settings')
                    ->schema([
                        TextInput::make('borrowing_period')
                            ->label('Borrowing Period')
                            ->required()
                            ->default('14')
                            ->suffix('days')
                            ->helperText('The number of days a book can be borrowed for.'),
                        TextInput::make('borrowing_limit')
                            ->label('Borrowing Limit')
                            ->required()
                            ->default('3')
                            ->suffix('books')
                            ->helperText('The maximum number of books a user can borrow at once.'),
                        TextInput::make('borrowing_fine')
                            ->label('Borrowing Fine')
                            ->required()
                            ->default('1500')
                            ->prefix('Rp.')
                            ->suffix('per day')
                            ->helperText('The fine charged per day for overdue books.'),
                    ]),
            ]);
    }
}
