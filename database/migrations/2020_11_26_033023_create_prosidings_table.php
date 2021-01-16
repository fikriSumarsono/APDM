<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsidingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosidings', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_issn',15);
            $table->string('judul',255);
            $table->string('nama_prosiding',255);
            $table->string('jenis_prosiding',255);
            $table->string('peran_penulis',255);
            $table->char('tahun_prosiding',255);
            $table->char('nidn',10);
            $table->string('volume',5);
            $table->char('nomor',3);
            $table->string('url',255)->nullable();
            $table->string('upload',255)->nullable();
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
        Schema::dropIfExists('prosidings');
    }
}
