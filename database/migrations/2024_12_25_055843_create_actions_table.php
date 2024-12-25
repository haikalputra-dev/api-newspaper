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
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('action_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('target_id');
            $table->enum('actions', ['view', 'like', 'dislike', 'comment', 'share', 'bookmark', 'report']);
            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
