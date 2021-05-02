<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_murids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('murid_id');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->unsignedBigInteger('asrama_id')->nullable();
            $table->date('tgl_sk')->nullable();
            $table->timestamps();

            $table->foreign('murid_id')->references('id')->on('murids');
            $table->foreign('kelas_id')->references('id')->on('kelas_periodes');
            $table->foreign('asrama_id')->references('id')->on('asrama_periodes');

            $table->unique(['murid_id','kelas_id']);
            $table->unique(['murid_id','asrama_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_murids');
    }
}
