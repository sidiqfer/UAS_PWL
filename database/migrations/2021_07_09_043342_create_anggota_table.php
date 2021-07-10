<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('no_anggota', 45);
            $table->string('nama');
            $table->enum('gender', ['L', 'P']);
            $table->string('tempat_lahir', 45);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('email', 45);
            $table->string('hp', 45);
            $table->string('foto', 45)->nullable();
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
        Schema::dropIfExists('anggota');
    }
}
