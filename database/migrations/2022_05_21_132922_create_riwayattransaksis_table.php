<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayattransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayattransaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->string('no_invoice');
            $table->string('nama');
            $table->string('layanan');
            $table->integer('total_biaya');
            $table->string('status_pembayaran');
            $table->string('status_pengambilan');
            $table->string('status_proses');
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
        Schema::dropIfExists('riwayattransaksis');
    }
}
