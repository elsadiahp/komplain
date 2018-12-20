<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomplainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komplain', function (Blueprint $table) {
            $table->increments('komplain_id');

            $table->unsignedInteger('waroeng_id');
            $table->foreign('waroeng_id')->references('waroeng_id')->on('waroeng');

            $table->unsignedInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategori');

            $table->string('media_koplain');
            $table->text('isi_komplain');
            $table->dateTime('tanggal_jam_komplain');
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
        Schema::dropIfExists('komplain');
    }
}
