<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTables extends Migration
{
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('unapproved_users');
    }

    public function down()
    {
        // If you want to rollback the drop, you can add the code to recreate the tables here
        // Remember to define the table structure in the `up` method of a separate migration file
    }
}
