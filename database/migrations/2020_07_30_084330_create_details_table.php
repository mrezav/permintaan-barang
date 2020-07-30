<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permintaan_id');
            $table->char('kode_barang',12);
            $table->integer('sub_qty');
            $table->text('keterangan');
            $table->foreign('permintaan_id')->references('id')->on('permintaan');
            $table->foreign('kode_barang')->references('kode')->on('barang');
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
        Schema::dropIfExists('details');
    }
}
