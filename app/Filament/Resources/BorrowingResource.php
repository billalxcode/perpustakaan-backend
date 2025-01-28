<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BorrowingResource\Pages;
use App\Models\BookBorrowing;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BorrowingResource extends Resource
{
    protected static ?string $model = BookBorrowing::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Borrowings';

    protected static ?string $navigationIcon = 'fluentui-book-add-24';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('book.name')
                    ->label('Name'),
                TextColumn::make('user.name')
                    ->label('Borrower'),
                TextColumn::make('borrowed_at')
                    ->label('Borrowed At')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([])
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
            'index' => Pages\ListBorrowings::route('/'),
            'create' => Pages\CreateBorrowing::route('/create'),
        ];
    }
}
