<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenarioLightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenario_light', function (Blueprint $table) {
            $table->unsignedInteger('scenario_id');
            $table->unsignedInteger('light_id');
            $table->unsignedInteger('preset')->default(0)->comment('亮度等级');
            $table->unsignedInteger("start_at")->default(0)->comment('从哪一秒开始');
            $table->unsignedInteger("duration")->default(0)->comment('持续多少秒');

            $table->primary(['scenario_id', 'light_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scenario_light');
    }
}
