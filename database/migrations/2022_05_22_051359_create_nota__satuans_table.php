<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaSatuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota__satuans', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice');
            $table->string('nama');
            $table->string('status_pembayaran');
            $table->string('item');
            $table->integer('estimasi_waktu');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('total_biaya');
            $table->integer('biaya_sekarang');
            $table->integer('sisa_biaya');
            $table->string('via');
            $table->date('mulai');
            $table->date('selesai');
            $table->text('keterangan');
            $table->string('collected_by');
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
        Schema::dropIfExists('nota__satuans');
    }
}
