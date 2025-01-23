<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(1)->create([
            'name' => "Al-Qur'An Cordoba Al-Hufaz Ka'Bah Hafalan Mudah A5",
            'author' => "Gramedia Widiasarana Indonesia",
            'isbn' => "9786026765840",
            "cover_image" => "https://cdn.gramedia.com/uploads/products/aaonh870u5.jpeg",
            "description" => "Al-Qur'an Cordoba Al-Hufaz Ka'Bah Hafalan Mudah A5 adalah Al-Qur'an yang dilengkapi dengan tajwid berwarna dan terjemahan. Al-Qur'an ini cocok untuk dijadikan sebagai hadiah atau kenang-kenangan. Al-Qur'an ini juga cocok untuk dijadikan sebagai hadiah atau kenang-kenangan.",
            "publisher" => "Gramedia Widiasarana Indonesia",
            "published_at" => "2020-03-06",
            "pages" => 604,
            "category_id" => 1,
        ]);
    }
}
