<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data__pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice');
            $table->date('tgl_transaksi');
            $table->string('nama');
            $table->string('handphone');
            $table->string('email');
            $table->text('alamat');
            $table->string('status_pembayaran');
            $table->string('status_pengambilan');
            $table->string('status_proses');
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
        Schema::dropIfExists('data__pelanggans');
    }
}
