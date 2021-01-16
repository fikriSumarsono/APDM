<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academiks', function (Blueprint $table) {
            $table->id();
            $table->char('nidn',10);
            $table->string('judul');
            $table->string('jenis');
            $table->string('peruntukan');
            $table->string('peran');
            $table->string('penyerahan');
            $table->string('pejabat_penerima');
            $table->string('tahun',10);
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
        Schema::dropIfExists('academiks');
    }
}
