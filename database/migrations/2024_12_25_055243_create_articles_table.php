<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('article_id');
            $table->string('title', 255);
            $table->longText('content');
            $table->string('featured_image_url', 255)->nullable();
            $table->enum('status', ['approved', 'pending'])->default('pending');
            $table->bigInteger('view_count')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('user_id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade');
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            
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
