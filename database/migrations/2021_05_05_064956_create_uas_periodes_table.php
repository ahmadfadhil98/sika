<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUasPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uas_periodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('periode_id');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('periode_id')->references('id')->on('periodes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uas_periodes');
    }
}
