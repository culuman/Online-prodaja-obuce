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
        Schema::create('shoes', function (Blueprint $table) {
          $table->id();
          $table->string('title');
          $table->string('body');
          $table->integer('price');
          $table->string('image1')->nullable();
          $table->string('image2')->nullable();
          $table->string('image3')->nullable();
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('category_id');
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
          $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
