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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('subcat_id')->nullable();
            $table->unsignedBigInteger('divi_id');
            $table->unsignedBigInteger('dist_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('title_bn');
            $table->string('title_en');
            $table->string('slug_bn');
            $table->string('slug_en');
            $table->string('image');
            $table->text('description_bn');
            $table->text('description_en')->nullable();
            $table->text('tags_bn');
            $table->text('tags_en')->nullable();
            $table->integer('headline')->default(0);
            $table->integer('first_section')->default(0);
            $table->integer('first_section_thumbnail')->default(0);
            $table->integer('bigthumbnail')->default(0);
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
            $table->timestamps();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcat_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->foreign('divi_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('dist_id')->references('id')->on('districs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
