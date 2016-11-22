<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presses', function (Blueprint $table) {
           $table->boolean('article_translation_back_later')->default(0);
           $table->boolean('publication_back_later')->default(0);
           $table->boolean('publication_translation_back_later')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presses', function (Blueprint $table) {
           $table->dropColumn('article_translation_back_later');
           $table->dropColumn('publication_back_later');
           $table->dropColumn('publication_back_later');
        });
    }
}
