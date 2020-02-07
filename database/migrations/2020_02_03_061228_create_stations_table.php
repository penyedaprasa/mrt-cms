<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',150);
            $table->string('description',255)->nullable();
            $table->string('image',255)->nullable();
            $table->double('latitude')->default(106.3);
            $table->double('longitude')->default(6.03);
            $table->time('time_open')->default('00:00:00');
            $table->time('time_close')->default('00:00:00');
            $table->integer('lanes')->default(2);
            $table->string('status',10)->default('open');
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
        Schema::dropIfExists('stations');
    }
}
