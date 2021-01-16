<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengabdiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengabdians', function (Blueprint $table) {
            $table->id();
            $table->string('judul',255);
            $table->char('nidn',10);
            $table->string('nama');
            $table->char('tahun',10);
            $table->string('peran');
            $table->string('approve',100)->nullable();
            $table->string('file',255)->nullable();
            $table->string('perbaikan_usulan',255)->nullable();
            $table->string('laporan_kemajuan',255)->nullable();
            $table->string('logbook',255)->nullable();
            $table->string('laporan_akhir',255)->nullable();
            $table->string('usulan_lanjutan',255)->nullable();
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
        Schema::dropIfExists('pengabdians');
    }
}
