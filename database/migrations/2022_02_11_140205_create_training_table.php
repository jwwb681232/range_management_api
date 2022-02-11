<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type')->comment('培训类型[1：Group,2：Individual,3：Manual Training,4：Remote Control Handset mode]');
            $table->unsignedInteger('scenario_id')->default(0)->comment('只有type=[1|2]的时候才有值');
            $table->unsignedInteger('rts_script_id');
            $table->timestamp('start_at');
            $table->timestamp('end_at');
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
        Schema::dropIfExists('training');
    }
}
