<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidebarMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebar_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',150);
            $table->string('tooltip',150)->nullable();
            $table->string('url')->nullable();
            $table->string('route')->nullable();
            $table->string('icon',50)->nullable();
            $table->integer('parent')->default(0);
            $table->string('enabled',1)->default('Y');
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
        Schema::dropIfExists('sidebar_menus');
    }
}
