<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookCategorySeeder extends Seeder
{
    private function createSubCategories($sub_categories, $parent_id)
    {
        foreach ($sub_categories as $sub_category) {
            $sub_category_data = [
                'name' => $sub_category->title,
                'slug' => $sub_category->slug,
                'description' => $sub_category->description ?? fake()->sentence(),
                'is_active' => true,
                'created_by' => User::first()->id,
                'parent_id' => $parent_id,
            ];

            $new_sub_category = BookCategory::create($sub_category_data);

            if (isset($sub_category->subcategory)) {
                $this->createSubCategories($sub_category->subcategory, $new_sub_category->id);
            }
       }
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book_categories_path = storage_path('json/book-categories.json');
        $book_categories_content = file_get_contents($book_categories_path);
        $book_categories_json = json_decode($book_categories_content);

        foreach ($book_categories_json->data as $book_category) {
            $book_category_data = [
                'name' => $book_category->title,
                'slug' => $book_category->slug,
                'description' => $book_category->description ?? fake()->sentence(),
                'is_active' => true,
                'created_by' => User::first()->id,
            ];

            $parent_book_category = BookCategory::create($book_category_data);

            if (isset($book_category->subcategory)) {
                $this->createSubCategories($book_category->subcategory, $parent_book_category->id);
            }
        }
    }
}