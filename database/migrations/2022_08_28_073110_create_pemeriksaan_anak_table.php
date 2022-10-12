<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanAnakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan_anak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasien');
            $table->foreignId('id_pemeriksaan')->constrained('pemeriksaan');
            $table->string('nama_ibu',30);
            $table->date('tgl_lahir');
            $table->enum('bcg',['true','false']);
            $table->enum('dpt',['true','false']);
            $table->enum('polio',['true','false']);
            $table->enum('ipv',['true','false']);
            $table->enum('campak',['true','false']);
            $table->enum('tetanus',['true','false']);
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
        Schema::dropIfExists('pemeriksaan_anak');
    }
}
