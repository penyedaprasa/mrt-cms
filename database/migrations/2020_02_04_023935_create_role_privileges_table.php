<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_privileges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id');
            $table->integer('menu_id');
            $table->string('grant_create',1)->default('N');
            $table->string('grant_read',1)->default('Y');
            $table->string('grant_update',1)->default('N');
            $table->string('grant_delete',1)->default('N');
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
        Schema::dropIfExists('role_privileges');
    }
}
