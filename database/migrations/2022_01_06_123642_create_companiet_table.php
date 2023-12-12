<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Companiet', function (Blueprint $table) {
            $table->id();
            $table->string('nama',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('logo',255)->nullable();
            $table->string('website',200)->nullable();
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
        Schema::dropIfExists('Companiet');
    }
}
