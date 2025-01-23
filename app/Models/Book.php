<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'isbn',
        'cover_image',
        'description',
        'publisher',
        'published_at',
        'pages',
        'category_id',
    ];
}
