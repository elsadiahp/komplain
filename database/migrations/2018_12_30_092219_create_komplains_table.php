<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komplains', function (Blueprint $table) {
            $table->increments('komplain_id');
            $table->unsignedInteger('komplain_waroeng_id');
            $table->unsignedInteger('komplain_media_id');
            $table->text('komplain_isi');
            $table->date('komplain_tanggal');
            $table->time('komplain_waktu');
            $table->unsignedInteger('komplain_input_by');
            $table->foreign('komplain_waroeng_id')
                ->references('waroeng_id')->on('waroengs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('komplain_media_id')
                ->references('media_id')->on('medias')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('komplain_input_by')
                ->references('id')->on('users')
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
        Schema::dropIfExists('komplains');
    }
}
