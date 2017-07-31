<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nomor');
            $table->integer('id_instansi')->unsigned();
            $table->string('perihal');
            $table->integer('id_sifat')->unsigned();
            $table->text('isi');
            $table->integer('id_pegawai')->unsigned();
            $table->integer('status')->default('0');
            $table->foreign('id_pegawai')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_instansi')->references('id')->on('instansi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sifat')->references('id')->on('sifat_surat')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('surat_keluar');
    }
}
