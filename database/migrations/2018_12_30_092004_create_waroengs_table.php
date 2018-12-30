<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaroengsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waroengs', function (Blueprint $table) {
            $table->increments('waroeng_id');
            $table->unsignedInteger('waroeng_area_id');
            $table->string('waroeng_nama');
            $table->text('waroeng_alamat');
            $table->foreign('waroeng_area_id')
                ->references('area_id')->on('areas')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('waroengs');
    }
}
