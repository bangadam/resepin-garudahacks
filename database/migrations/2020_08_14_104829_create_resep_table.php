<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user_pasien'); //sambung ke table users, bukan table pasien
            $table->unsignedBigInteger('id_user_dokter');
            $table->unsignedBigInteger('id_user_apoteker')->nullable(); //null = blm ditebus
            $table->dateTime('tanggal_resep');
            $table->dateTime('tanggal_tebus')->nullable();
            $table->string('diagnosa')->nullable();
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
        Schema::dropIfExists('resep');
    }
}
