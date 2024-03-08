<?php

use Database\Seeders\default_admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fullname');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('kota');
            $table->string('no_hp');
            $table->string('api_key');
            $table->string('api_signature');
            $table->string('otoritas');
            $table->string('perusahaan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('notif_wa');
            $table->string('status');
            $table->string('saldo');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $admin = new default_admin;
        $admin->run();
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
