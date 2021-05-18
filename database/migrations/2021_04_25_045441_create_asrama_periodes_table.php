<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsramaPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama_periodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asrama_id');
            $table->unsignedBigInteger('periode_id');
            $table->unsignedBigInteger('binsis_id');
            $table->timestamps();

            $table->foreign('asrama_id')->references('id')->on('asramas')->onUpdate('cascade');
            $table->foreign('periode_id')->references('id')->on('periodes')->onUpdate('cascade');
            $table->foreign('binsis_id')->references('id')->on('guru_tendiks')->onUpdate('cascade');

            $table->unique(['asrama_id','periode_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asrama_periodes');
    }
}
