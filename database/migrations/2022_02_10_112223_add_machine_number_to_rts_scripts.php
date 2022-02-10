<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMachineNumberToRtsScripts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rts_scripts', function (Blueprint $table) {
            $table->string('machine_number')->after('id')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rts_scripts', function (Blueprint $table) {
            $table->dropColumn('machine_number');
        });
    }
}
