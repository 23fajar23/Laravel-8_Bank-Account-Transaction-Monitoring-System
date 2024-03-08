<?php

use Database\Seeders\default_autonotif;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutonotifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autonotifs', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('username')->nullable();
            $table->string('api_key')->nullable();
            $table->string('kategori');
            $table->string('otoritas');
            $table->text('message')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        $seed = new default_autonotif;
        $seed->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autonotifs');
    }
}
