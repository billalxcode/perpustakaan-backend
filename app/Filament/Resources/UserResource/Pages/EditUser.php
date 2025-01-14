<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('Change Password')
                ->modalWidth('sm')
                ->color('secondary')
                ->form([
                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->required()
                        ->autocomplete('new-password'),
                    TextInput::make('password_confirmation')
                        ->label('Confirm Password')
                        ->password()
                        ->required()
                        ->autocomplete('new-password'),
                ])
                ->action(function (User $record, array $data) {
                    $user_id = $record->id;

                    $record->updateOrFail([
                        'password' => bcrypt($data['password']),
                    ]);
                }),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Information')
                    ->schema([
                        TextInput::make('name')
                            ->placeholder('Enter your full name')
                            ->required()
                            ->autofocus()
                            ->label('Full Name'),
                        TextInput::make('email')
                            ->placeholder('Enter your email address')
                            ->required()
                            ->label('Email Address'),
                        TextInput::make('username')
                            ->placeholder('Enter your username')
                            ->required()
                            ->label('Username'),
                    ]),
            ]);
    }
}
