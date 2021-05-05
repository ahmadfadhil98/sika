<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngsuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uas_id');
            $table->integer('no');
            $table->integer('jumlah');
            $table->text('bukti');
            $table->date('tgl');
            $table->timestamps();

            $table->foreign('uas_id')->references('id')->on('uang_asramas')->onDelete('cascade');

            $table->unique(['uas_id','no']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angsurans');
    }
}
