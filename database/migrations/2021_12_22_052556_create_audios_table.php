<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audios', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('音频名称');
            $table->string('path')->comment('音频存放地址');
            $table->unsignedInteger('size')->comment('字节');
            $table->unsignedInteger('duration')->comment('时长(秒)');
            $table->unsignedTinyInteger('type')->comment('类型(1:Alarm,2:Explosion)');
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
        Schema::dropIfExists('audios');
    }
}
