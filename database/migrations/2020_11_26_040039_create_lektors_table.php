<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLektorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lektors', function (Blueprint $table) {
            $table->id();
            $table->char('nidn',10)->unique();
            $table->string('nama',255);
            $table->char('no_hp',13);
            $table->string('foto',255)->nullable();
            $table->string('institusi',255);
            $table->string('program_studi',255);
            $table->string('pendidikan',255);
            $table->string('skill',255);
            $table->string('jabatan',255);
            $table->string('alamat',255);
            $table->string('tanggal_lahir',255);
            $table->char('no_ktp',16)->unique();
            $table->string('email',255);
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
        Schema::dropIfExists('lektors');
    }
}
