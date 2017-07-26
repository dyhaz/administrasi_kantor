<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->date('tanggal_terima');
            $table->string('nomor_naskah_dinas');
            $table->integer('id_sifat');
            $table->integer('id_instansi');
            $table->text('perihal');
            $table->text('isi_ringkas');
            $table->string('file');
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
        Schema::drop('surat_masuk');
    }
}
