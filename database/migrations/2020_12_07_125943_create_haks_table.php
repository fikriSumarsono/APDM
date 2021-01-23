<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haks', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('jenis');
            $table->string('status');
            $table->string('nomor_hki',50)->unique();
            $table->string('nomor_pendaftaran',50)->unique();
            $table->char('nidn',10);
            $table->char('tahun',5);
            $table->string('url')->nullable();
            $table->string('upload')->nullable();
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
        Schema::dropIfExists('haks');
    }
}
