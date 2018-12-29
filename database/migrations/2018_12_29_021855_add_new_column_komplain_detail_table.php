<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnKomplainDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komplain_detail', function (Blueprint $table){
            $table->unsignedInteger('kategori_detail_id')->after('komplain_id');
            $table->foreign('kategori_detail_id')->references('kategori_detail_id')->on('kategori_detail');
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
