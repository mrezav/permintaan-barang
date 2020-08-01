<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            // $table->id();
            $table->char('kode', 12)->primary();
            $table->string('nama');
            $table->integer('stok');
            $table->boolean('status');
            $table->string('satuan');
            $table->string('kode_lokasi');
            $table->foreign('kode_lokasi')->references('kode')->on('lokasi');
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
        Schema::dropIfExists('barang');
    }
}
