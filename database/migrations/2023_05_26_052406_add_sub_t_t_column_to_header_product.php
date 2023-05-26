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
    Schema::table('header_product', function (Blueprint $table) {
        $table->json('subTT')->default('[]')->after('title_text');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('header_product', function (Blueprint $table) {
            //
        });
    }
};
