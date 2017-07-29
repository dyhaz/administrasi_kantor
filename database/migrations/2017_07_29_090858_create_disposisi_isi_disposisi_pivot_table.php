<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisiIsiDisposisiPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_isi_disposisi', function (Blueprint $table) {
            $table->integer('disposisi_id')->unsigned()->index();
            $table->foreign('disposisi_id')->references('id')->on('disposisi')->onDelete('cascade');
            $table->integer('isi_disposisi_id')->unsigned()->index();
            $table->foreign('isi_disposisi_id')->references('id')->on('isi_disposisi')->onDelete('cascade');
            $table->primary(['disposisi_id', 'isi_disposisi_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('disposisi_isi_disposisi');
    }
}
