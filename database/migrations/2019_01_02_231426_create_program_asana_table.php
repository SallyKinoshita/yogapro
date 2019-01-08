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
        Schema::create('program_asana', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('program_id')->index();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->unsignedInteger('order');
            $table->unsignedInteger('asana_id')->index();
            $table->foreign('asana_id')->references('id')->on('asanas')->onDelete('cascade');
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
        Schema::dropIfExists('program_asana');
    }
}
