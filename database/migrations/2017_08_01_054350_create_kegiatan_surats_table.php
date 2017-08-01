<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKegiatanSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_surat', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_klasifikasi_arsip')->unsigned();
            $table->integer('id_kegiatan')->unsigned();
            $table->foreign('id_klasifikasi_arsip')->references('id')->on('klasifikasi_arsip')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kegiatan')->references('id')->on('kegiatan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('kegiatan_surat');
    }
}
