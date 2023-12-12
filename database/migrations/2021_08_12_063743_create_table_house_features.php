<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHouseFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_features', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('house_id')->nullable()->unsigned();
            $table->string('feature')->nullable();
            $table->timestamps();

            $table->foreign('house_id')->references('id')->on('house');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_house_features');
    }
}
