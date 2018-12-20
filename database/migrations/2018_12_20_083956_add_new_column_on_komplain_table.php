<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnOnKomplainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komplain', function (Blueprint $table) {
            $table->dropColumn('tanggal_jam_komplain');
            $table->date('tanggal_komplain')->after('isi_komplain');
            $table->time('waktu_komplain')->after('tanggal_komplain');
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
