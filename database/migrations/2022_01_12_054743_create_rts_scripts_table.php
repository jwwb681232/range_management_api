<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtsScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rts_scripts', function (Blueprint $table) {
            $table->id();
            $table->string('range_name');
            $table->unsignedInteger('index')->comment('脚本index');
            $table->string('name')->comment('脚本名称');
            $table->unsignedInteger('scenario_id')->comment('场景id');
            $table->string('scenario_name')->comment('场景名称');
            $table->json('steps')->comment('步骤');
            $table->json('participants');
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
        Schema::dropIfExists('rts_scripts');
    }
}
