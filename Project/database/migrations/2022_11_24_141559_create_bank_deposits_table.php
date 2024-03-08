<?php

use Database\Seeders\default_bank;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_deposits', function (Blueprint $table) {
            $table->id();
            $table->string('service');
            $table->string('no_rekening');
            $table->string('nama_rekening');
            $table->string('company_id');
            $table->string('username_ibank');
            $table->string('password_ibank');
            $table->string('status');
            $table->string('mutasi');
            $table->timestamps();
        });

        $admin = new default_bank;
        $admin->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_deposits');
    }
}
