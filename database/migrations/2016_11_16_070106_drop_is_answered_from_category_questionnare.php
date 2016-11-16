<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropIsAnsweredFromCategoryQuestionnare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_questionnare', function (Blueprint $table) {
            $table->dropColumn('is_answered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_questionnare', function (Blueprint $table) {
           $table->boolean('is_answered')->default(false);
        });
    }
}
