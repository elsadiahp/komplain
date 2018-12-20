<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaroengTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waroeng', function (Blueprint $table) {
            $table->increments('waroeng_id');
            $table->string('waroeng_nama');
            $table->string('waroeng_alamat');
            $table->unsignedInteger('area_id');
            $table->foreign('area_id')->references('area_id')->on('area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waroeng');
    }
}
