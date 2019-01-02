<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramAsanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_asana', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id');
            $table->integer('asana_id');
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
        Schema::table('program_asana', function (Blueprint $table) {
            Schema::dropIfExists('program_asana');
        });
    }
}
