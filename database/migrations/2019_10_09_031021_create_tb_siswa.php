<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nisn')->unique();
            $table->string('nama',255);
            $table->string('alamat',255);
            $table->string('agama',255);
            $table->string('jenis_kelamin',30);
            $table->string('nama_ayah',255);
            $table->string('nama_ibu',255);
            $table->string('nmr_ortu',20);
            $table->bcrypt('password',255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
