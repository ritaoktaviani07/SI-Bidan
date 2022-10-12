<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbuMelahirkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu_melahirkan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasien');
            $table->foreignId('id_pemeriksaan')->constrained('pemeriksaan');
            $table->date('tgl_melahirkan')->nullable();
            $table->enum('jekel_anak',['pria','wanita'])->nullable();
            $table->string('berat_anak',7)->nullable();
            $table->string('tinggi_anak',7)->nullable();
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
        Schema::dropIfExists('ibu_melahirkan');
    }
}
