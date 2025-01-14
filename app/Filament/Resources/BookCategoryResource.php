<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookCategoryResource\Pages;
use App\Models\BookCategory;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookCategoryResource extends Resource
{
    protected static ?string $model = BookCategory::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationIcon = 'ionicon-list-sharp';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Name'),
                TextColumn::make('slug')
                    ->searchable()
                    ->label('Slug'),
                TextColumn::make('description')
                    ->searchable()
                    ->label('Description'),
                TextColumn::make('created_at')
                    ->searchable()
                    ->label('Created At'),
                TextColumn::make('parent_id')
                    ->searchable()
                    ->label('Parent ID')
                    ->formatStateUsing(function ($state) {
                        return BookCategory::find($state)->name ?? "N/A";
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListBookCategories::route('/'),
            'create' => Pages\CreateBookCategory::route('/create'),
            'edit' => Pages\EditBookCategory::route('/{record}/edit'),
        ];
    }
}
