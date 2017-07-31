<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDisposisiTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_tujuan', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_disposisi')->unsigned();
            $table->integer('id_divisi')->unsigned();
            $table->integer('id_jabatan')->unsigned();
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
        Schema::drop('disposisi_tujuan');
    }
}
