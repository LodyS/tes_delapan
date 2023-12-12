<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanNasabahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman_nasabah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nasabah_id')->nullable()->unsigned();
            $table->bigInteger('total_pinjaman')->nullable()->unsigned();
            $table->integer('suku_bunga_per_bulan')->nullable()->unsigned();
            $table->date('tanggal_disetujui')->nullable();
            $table->integer('tenor')->unsigned()->nullable();
            $table->string('status')->default('Menunggu');
            $table->timestamps();

            $table->foreign('nasabah_id')->references('id')->on('nasabah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman_nasabahs');
    }
}
