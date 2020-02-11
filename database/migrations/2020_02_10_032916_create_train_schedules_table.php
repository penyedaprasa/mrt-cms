<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('train_id');
            $table->integer('station_id');
            $table->integer('destination');
            $table->integer('departure_hour')->default(0);
            $table->integer('departure_minute')->default(0);
            $table->integer('dep_hday_hour')->default(0);
            $table->integer('dep_hday_minute')->default(0);
            $table->string('status',30)->default('enable');
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
        Schema::dropIfExists('train_schedules');
    }
}
