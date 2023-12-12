<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasbonApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasbon_api', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_diajukan')->nullable();
            $table->date('tanggal_disetujui')->nullable();
            $table->bigInteger('pegawai_id')->unsigned()->nullable();
            $table->bigInteger('total_kasbon')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai_api');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasbon_apis');
    }
}
