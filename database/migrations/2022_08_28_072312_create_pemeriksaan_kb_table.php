<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanKbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan_kb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasien');
            $table->foreignId('id_pemeriksaan')->constrained('pemeriksaan');
            $table->string('berat_badan',7)->nullable();
            $table->string('tekanan_darah',12)->nullable();
            $table->string('kontrasepsi',25)->nullable();
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
        Schema::dropIfExists('pemeriksaan_kb');
    }
}
