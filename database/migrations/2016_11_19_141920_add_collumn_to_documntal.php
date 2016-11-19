<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumnToDocumntal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documental', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('document_type')->nullable();
            $table->boolean('is_back_later')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documental', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('document_type');
            $table->dropColumn('is_back_later');
        });
    }
}
