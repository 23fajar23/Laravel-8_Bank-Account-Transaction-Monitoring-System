<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_banks', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('service');
            $table->string('no_rekening');
            $table->string('nama_paket');
            $table->string('referal_paket_id');
            $table->string('harga');
            $table->string('jenis');
            $table->string('date');
            $table->string('date_expired');
            $table->string('status');
            $table->string('username_ibank');
            $table->string('password_ibank');
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
        Schema::dropIfExists('list_banks');
    }
}
