<?php

namespace App\Filament\Resources\BorrowingResource\Pages;

use App\Filament\Resources\BorrowingResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListBorrowings extends ListRecords
{
    protected static string $resource = BorrowingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Borrowings'),
            'borrowed' => Tab::make('Borrowed')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', '=', 'borrowed')),
            'returned' => Tab::make('Returned')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', '=', 'returned')),
        ];
    }
}
