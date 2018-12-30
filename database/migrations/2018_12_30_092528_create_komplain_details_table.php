<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomplainDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komplain_details', function (Blueprint $table) {
            $table->increments('komplain_detail_id');
            $table->unsignedInteger('komplain_detail_komplain_id');
            $table->unsignedInteger('komplain_detail_kategori_id');
            $table->foreign('komplain_detail_komplain_id')
                ->references('komplain_id')->on('komplains')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('komplain_detail_kategori_id')
                ->references('kategori_id')->on('kategoris')
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
        Schema::dropIfExists('komplain_details');
    }
}
