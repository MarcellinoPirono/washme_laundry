<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLayananKiloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data__layanan__kiloans', function (Blueprint $table) {
            $table->id();
            $table->string('layanan');                        
            $table->string('jenis');
            $table->string('image', 2048)->nullable();            
            $table->integer('estimasi_waktu');
            $table->text('keterangan');
            $table->integer('harga');
            $table->boolean('waktu_id')->default(false);
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
        Schema::dropIfExists('data__layanan__kiloans');
    }
}
