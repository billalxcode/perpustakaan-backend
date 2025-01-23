<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;

class EditBook extends EditRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form
            ->schema([
                Section::make('Book Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        TextInput::make('author')
                            ->label('Author')
                            ->required(),
                        TextInput::make('isbn')
                            ->label('ISBN')
                            ->required(),
                        TextInput::make('publisher')
                            ->label('Publisher')
                            ->required(),
                        Select::make('category_id')
                            ->label('Category')
                            ->options(
                                \App\Models\BookCategory::all()
                                    ->pluck('name', 'id')
                            )
                            ->required(),
                    ]),
                Section::make('Additional Information')
                    ->schema([
                        DatePicker::make('published_at')
                            ->label('Published At')
                            ->required(),
                        TextInput::make('pages')
                            ->label('Pages')
                            ->numeric(),
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->autosize()
                            ->required(),
                    ]),
            ]);
    }
}
