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
        Schema::create('overviews', function (Blueprint $table) {
          $table->id();
          $table->string('imgsrc');
          $table->string('imgalt');
          $table->string('titleLi');
          $table->string('text1');
          $table->string('text2');
          $table->string('text3');
          $table->string('link');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('overviews');
    }
};
