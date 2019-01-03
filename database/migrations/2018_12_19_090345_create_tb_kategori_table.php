<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kategori', function (Blueprint $table) {
            $table->increments('id_kategori');
            $table->unsignedInteger('id_kategori_parent')->nullable();
            $table->unsignedInteger('bagian_id')->nullable();
            $table->string('nama_kategori');
            $table->foreign('bagian_id')->references('bagian_id')->on('bagian')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('id_kategori_parent')->references('id_kategori')->on('tb_kategori')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('tb_kategori');
    }
}
