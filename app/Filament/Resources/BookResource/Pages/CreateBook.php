<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use App\Models\BookCategory;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateBook extends CreateRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Book Information'))
                    ->schema([
                        FileUpload::make('cover_image')
                            ->label('Cover Image')
                            ->maxSize(1024 * 1024 * 2)
                            ->image()
                            ->required(),
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
                            ->native(false)
                            ->searchable()
                            ->options(
                                BookCategory::all()
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
                            ->numeric()
                            ->required(),
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(5)
                            ->autosize()
                            ->required(),
                    ]),
            ]);
    }
}
