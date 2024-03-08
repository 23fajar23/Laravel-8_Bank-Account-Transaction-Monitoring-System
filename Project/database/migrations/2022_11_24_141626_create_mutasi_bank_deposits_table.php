<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasiBankDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi_bank_deposits', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekening');
            $table->string('service');
            $table->text('deskripsi');
            $table->string('tipe');
            $table->string('tgl_transaksi');
            $table->string('nominal');
            $table->string('saldo');
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
        Schema::dropIfExists('mutasi_bank_deposits');
    }
}
