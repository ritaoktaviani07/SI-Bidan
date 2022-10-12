<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tindakan')->constrained('tindakan');
            $table->string('nama_pasien',30)->nullable();
            $table->string('nik',16)->nullable();
            $table->enum('jenis_kelamin',['pria','wanita'])->nullable();
            $table->string('umur',2)->nullable();
            $table->string('no_hp',12)->nullable();
            $table->text('alamat',50)->nullable();

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
        Schema::dropIfExists('pasien');
    }
}
