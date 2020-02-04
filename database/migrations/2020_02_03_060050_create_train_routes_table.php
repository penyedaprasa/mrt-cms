<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('train_id');
            $table->integer('route_id');
            $table->time('arrival')->default('00:00:00');
            $table->time('departure')->default('00:00:00');
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
        Schema::dropIfExists('train_routes');
    }
}
