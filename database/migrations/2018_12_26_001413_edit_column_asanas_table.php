<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditColumnAsanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asanas', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable(false)->change();
//            $table->unsignedTinyInteger('private_flg')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asanas', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
//            $table->unsignedTinyInteger('private_flg')->nullable()->change();
        });
    }
}
