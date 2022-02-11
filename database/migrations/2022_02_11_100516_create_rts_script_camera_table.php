<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtsScriptCameraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rts_script_camera', function (Blueprint $table) {
            $table->unsignedInteger('rts_script_id');
            $table->unsignedInteger('camera_id');

            $table->primary(['rts_script_id', 'camera_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rts_script_camera');
    }
}
