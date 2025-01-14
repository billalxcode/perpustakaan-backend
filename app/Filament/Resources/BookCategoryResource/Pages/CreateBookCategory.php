<?php

namespace App\Filament\Resources\BookCategoryResource\Pages;

use App\Filament\Resources\BookCategoryResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateBookCategory extends CreateRecord
{
    protected static string $resource = BookCategoryResource::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Book Category Information')
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->placeholder('Novel')
                        // ->reactive()
                        ->live(true, 100)
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('slug', \Illuminate\Support\Str::slug($state));
                        }),
                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->placeholder('novel')
                        ->reactive()
                        ->readOnly()
                        ->helperText('This will be automatically generated from the name.'),
                    TextInput::make('description')
                        ->label('Description')
                        ->required()
                        ->placeholder('A book that tells a story'),
                ]),
        ]);
    }
}
