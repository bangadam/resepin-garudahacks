<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resep');
            $table->unsignedBigInteger('id_obat');
            $table->smallInteger('kuantitas');
            $table->string('satuan');
            $table->smallInteger('periode');
            $table->smallInteger('dalam_sehari');
            $table->smallInteger('dalam_sekali');
            $table->boolean('boleh_berulang');
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
        Schema::dropIfExists('resep_detail');
    }
}
