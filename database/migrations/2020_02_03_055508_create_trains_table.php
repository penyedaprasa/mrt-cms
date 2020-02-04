<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('train_code',20)->unique();
            $table->string('image',250)->nullable();
            $table->string('description',250)->nullable();
            $table->string('train_type',100)->nullable();
            $table->integer('speed')->default(0);//
            $table->string('speed_unit')->nullable();//mph or knote
            $table->double('current_lat')->default(106.3);
            $table->double('current_lng')->default(6.03);
            $table->string('status',40)->default('idle'); //running,idle,loading,unloading,stop
            $table->integer('heading_to')->default(0);
            $table->string('enabled',12)->nullable();
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
        Schema::dropIfExists('trains');
    }
}
