<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('author');
            $table->string('isbn');
            $table->string('cover_image')->nullable();
            $table->text('description')->nullable();
            $table->string('publisher');
            $table->date('published_at');

            $table->integer('pages');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('book_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
