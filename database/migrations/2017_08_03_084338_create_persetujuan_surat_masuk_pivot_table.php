<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersetujuanSuratMasukPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_surat_masuk', function (Blueprint $table) {
            $table->integer('surat_masuk_id')->unsigned()->index();
            $table->foreign('surat_masuk_id')->references('id')->on('surat_masuk')->onDelete('cascade');
            $table->integer('pegawai_id')->unsigned()->index();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['surat_masuk_id', 'pegawai_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pegawai_surat_masuk');
    }
}
