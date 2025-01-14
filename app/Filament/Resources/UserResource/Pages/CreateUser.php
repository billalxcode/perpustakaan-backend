<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('User Information')
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->placeholder('John Doe'),
                    TextInput::make('email')
                        ->label('Email')
                        ->required()
                        ->placeholder('johndoe@example.com'),
                    TextInput::make('username')
                        ->label('Username')
                        ->required()
                        ->placeholder('johndoe'),
                ]),
            Section::make('Security')
                ->schema([
                    TextInput::make('password')
                        ->label('Password')
                        ->required()
                        ->placeholder('password')
                        ->type('password'),
                    TextInput::make('password_confirmation')
                        ->label('Confirm Password')
                        ->required()
                        ->placeholder('password')
                        ->type('password'),
                ]),
        ]);
    }
}
