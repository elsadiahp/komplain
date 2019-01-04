<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumOnTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('username')->unique();

            $table->unsignedInteger('users_waroeng_id')->after('username')->nullable();
            $table->foreign('users_waroeng_id')->references('waroeng_id')->on('waroeng');

            $table->unsignedInteger('users_area_id')->after('users_waroeng_id');
            $table->foreign('users_area_id')->references('area_id')->on('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
