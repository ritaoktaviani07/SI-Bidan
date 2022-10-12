<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbuHamilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu_hamil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasien');
            $table->foreignId('id_pemeriksaan')->constrained('pemeriksaan');
            $table->string('gpah',10)->nullable();
            $table->date('hpl')->nullable();
            $table->string('usia_kehamilan',12)->nullable();
            $table->string('jarak_anak',12)->nullable();
            $table->string('tekanan_darah',12)->nullable();
            $table->string('berat_badan',3)->nullable();
            $table->string('tinggi_fungsi_uteri',12)->nullable();
            $table->string('letak_janin',12)->nullable();
            $table->string('detak_jantung_janin',12)->nullable();
            $table->date('taksiran_persalinan')->nullable();

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
        Schema::dropIfExists('ibu_hamil');
    }
}
