<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->date('tgl');
            $table->integer('jumlah')->default(1);
            $table->integer('harga');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barangs')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
}
