<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->increments('kategori_id');
            $table->unsignedInteger('kategori_parent_id')->nullable();
            $table->unsignedInteger('kategori_bagian_id');
            $table->string('kategori_bagian_nama');
            $table->foreign('kategori_parent_id')
                  ->references('kategori_id')->on('kategoris')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kategori_bagian_id')
                ->references('bagian_id')->on('bagians')
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
        Schema::dropIfExists('kategoris');
    }
}
