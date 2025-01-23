<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BookBorrowingFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id',
        'borrower_id',
        'borrowed_at',
        'returned_at',
        'notes',
        'penalty_fee',
        'status',
    ];
}
