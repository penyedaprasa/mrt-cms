<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('route_id');
            $table->integer('station_id');
            $table->time('arrival')->default('00:00:00');//waktu datang
            $table->time('stoppage_time')->default('00:00:00');
            $table->string('status')->default('pitstop');
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
        Schema::dropIfExists('route_stations');
    }
}
