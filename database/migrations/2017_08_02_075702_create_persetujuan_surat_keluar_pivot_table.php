<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersetujuanSuratKeluarPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_surat_keluar', function (Blueprint $table) {
            $table->integer('surat_keluar_id')->unsigned()->index();
            $table->foreign('surat_keluar_id')->references('id')->on('surat_keluar')->onDelete('cascade');
            $table->integer('pegawai_id')->unsigned()->index();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['surat_keluar_id', 'pegawai_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pegawai_surat_keluar');
    }
}
