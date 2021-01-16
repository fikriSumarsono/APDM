<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanjutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lanjutans', function (Blueprint $table) {
            $table->id();
            $table->string('judul',255);
            $table->char('nidn',10);
            $table->char('tahun',10);
            $table->string('usulan',255);
            $table->string('laporan_kemajuan',255)->nullable();
            $table->string('logbook',255)->nullable();
            $table->string('laporan_akhir',255)->nullable();
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
        Schema::dropIfExists('lanjutans');
    }
}
