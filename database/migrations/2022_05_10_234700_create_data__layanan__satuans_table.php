<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLayananSatuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data__layanan__satuans', function (Blueprint $table) {
            $table->id();
            $table->string('layanan');          
            $table->string('item');
            $table->string('image', 2048)->nullable();            
            $table->integer('estimasi_waktu');
            $table->text('keterangan');
            $table->boolean('size_id')->default(false);
            $table->integer('harga');
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
        Schema::dropIfExists('data__layanan__satuans');
    }
}
