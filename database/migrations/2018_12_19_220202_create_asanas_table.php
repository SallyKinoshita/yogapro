<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asanas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('six_category',100);
            $table->unsignedTinyInteger('posture');
            $table->unsignedInteger('intensity');
            $table->text('description')->nullable();
            $table->string('image',255)->nullable();
            $table->string('url',255)->nullable();
            $table->unsignedTinyInteger('private_flg')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asanas');
    }
}
