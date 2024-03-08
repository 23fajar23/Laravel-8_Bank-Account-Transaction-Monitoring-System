<?php

use Carbon\Carbon;
use Database\Seeders\default_otp;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('kode');
            $table->string('status_resend');
            $table->string('date_expired');
            $table->timestamps();
        });

        $admin = new default_otp;
        $admin->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otps');
    }
}
