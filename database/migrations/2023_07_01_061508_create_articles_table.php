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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('Slug');
            $table->text('description');
            $table->string('thumbnail');
            $table->unsignedSmallInteger('rating');
            $table->string('link');
            $table->text('seo_title');
            $table->text('seo_description');
            $table->integer('age_from');
            $table->integer('age_to');
            $table->text('files');
            $table->text('color');
            $table->text('active');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');







            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
