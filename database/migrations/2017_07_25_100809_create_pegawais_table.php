<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nip');
            $table->text('nama');
            $table->text('alamat');
            $table->integer('id_divisi');
            $table->integer('id_jabatan');
            $table->string('jenis_kelamin');
            $table->text('no_telp');
            $table->date('tanggal_lahir');
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
        Schema::drop('pegawai');
    }
}
