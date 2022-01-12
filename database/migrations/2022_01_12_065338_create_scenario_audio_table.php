<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenarioAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenario_audio', function (Blueprint $table) {
            $table->unsignedInteger('scenario_id');
            $table->unsignedInteger('audio_id');
            $table->unsignedInteger("start_at")->default(0)->comment('从哪一秒开始播放');
            $table->unsignedInteger("duration")->default(0)->comment('持续播放多少秒');

            $table->primary(['scenario_id', 'audio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scenario_audio');
    }
}
