<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestinnaryTypeToQuestionnares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('questionnares', function (Blueprint $table) {
            $table->string('questionnare_type')->default('text')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('questionnares', function (Blueprint $table) {
            $table->dropColumn('questionnare_type');
        });
    }
}
