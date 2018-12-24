<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('tag',30)->nullable()->after('name');
            $table->string('contents',300)->after('tag');
            $table->text('description')->nullable()->after('contents');
            $table->unsignedInteger('time')->nullable()->after('description');
            $table->unsignedTinyInteger('private_flg')->default(0)->after('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('tag');
            $table->dropColumn('contents');
            $table->dropColumn('description');
            $table->dropColumn('time');
            $table->dropColumn('private_flg');
        });
    }
}
