<?php

namespace App\Filament\Resources\BorrowingResource\Pages;

use App\Filament\Resources\BorrowingResource;
use App\Models\Book;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateBorrowing extends CreateRecord
{
    protected static string $resource = BorrowingResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['borrowed_at'] = now();
        $data['notes'] = '';
        $data['penalty_fee'] = 0;
        $data['status'] = 'borrowed';

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Borrowing Information')
                    ->schema([
                        Select::make('book_id')
                            ->label('Book')
                            ->options(
                                Book::all()->mapWithKeys(function ($book) {
                                    return [$book->id => "{$book->isbn} - {$book->name}"];
                                })->toArray()
                            )
                            ->native(false)
                            ->searchable()
                            ->required(),
                        Select::make('borrower_id')
                            ->label('Borrower')
                            ->options(
                                User::all()->filter(function (User $borrower) {
                                    return $borrower->hasRole('member');
                                })->mapWithKeys(function (User $borrower) {
                                    return [$borrower->id => "{$borrower->email} - {$borrower->name}"];
                                })->toArray()
                            )
                            ->native(false)
                            ->searchable()
                            ->required(),
                    ]),
            ]);
    }
}
