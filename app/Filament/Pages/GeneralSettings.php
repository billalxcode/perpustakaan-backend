<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings as Settings;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class GeneralSettings extends SettingsPage
{
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = Settings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Settings')
                    ->schema([
                        ColorPicker::make('primary_theme_color')
                            ->label('Primary Theme Color')
                            ->default('#22c55e')
                            ->required(),
                        Select::make('locale')
                            ->label('Locale')
                            ->native(false)
                            ->required()
                            ->options([
                                'en' => 'English',
                                'id' => 'Indonesian',
                            ]),
                    ]),
            ]);
    }
}
