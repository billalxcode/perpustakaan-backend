<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class BookResource extends Resource
{
    use Translatable;

    protected static ?string $model = Book::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $navigationIcon = 'tabler-books';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('Cover Image')
                    ->url(function ($record) {
                        if (str($record->cover_image)->isUrl()) {
                            return $record->cover_image;
                        }

                        return Storage::url($record->cover_image);
                    })
                    ->size(80),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('author')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('publisher')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('published_at')
                    ->searchable()
                    ->sortable(),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
