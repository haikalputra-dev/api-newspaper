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
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('media_id');
            $table->string('file_name', 255);
            $table->string('file_type', 255);
            $table->string('file_url', 255);
            $table->integer('file_size');
            $table->timestamps();

            // Foreign Key
            $table->unsignedBigInteger('uploaded_by')->nullable(); 
            $table->foreign('uploaded_by')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
