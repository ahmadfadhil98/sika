<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangAsramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_asramas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('murid_id');
            $table->text('keterangan')->nullable();
            $table->integer('month');
            // $table->text('bukti');
            $table->integer('jumlah');
            // $table->date('tgl');
            $table->timestamps();

            $table->foreign('murid_id')->references('id')->on('detail_murids')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uang_asramas');
    }
}
