<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama_jurnal');
            $table->char('nidn',10);
            $table->char('nomor',3);
            $table->string('issn',15);
            $table->string('jenis_publikasi');
            $table->string('peran_penulis');
            $table->char('tahun');
            $table->string('volume',15);
            $table->string('url');
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
        Schema::dropIfExists('journals');
    }
}
