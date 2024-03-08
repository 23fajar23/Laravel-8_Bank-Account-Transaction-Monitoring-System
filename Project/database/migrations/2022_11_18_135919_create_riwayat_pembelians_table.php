<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('nama_paket');
            $table->string('jenis');
            $table->string('service');
            $table->string('no_rekening');
            $table->string('harga');
            $table->string('durasi');
            $table->string('tgl_pembelian');
            $table->string('status');
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
        Schema::dropIfExists('riwayat_pembelians');
    }
}
