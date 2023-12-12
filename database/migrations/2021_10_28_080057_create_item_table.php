<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_number')->nullable()->unsigned();
            $table->date('date')->nullable();
            $table->integer('item_number')->nullable()->unsigned();
            $table->string('desc',255)->nullable();
            $table->string('variant_code',255)->nullable();
            $table->integer('quantity')->nullable()->unsigned();
            $table->bigInteger('cost')->nullable()->unsigned();
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
        Schema::dropIfExists('item');
    }
}
