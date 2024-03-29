<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotteries', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cat_id');
            $table->bigInteger('serial');
            $table->bigInteger('u_id');
            $table->integer('first_number');
            $table->integer('second_number');
            $table->integer('third_number');
            $table->integer('fourth_number');
            $table->integer('fifth_number');
            $table->integer('sixth_number');
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
        Schema::dropIfExists('lotteries');
    }
}
