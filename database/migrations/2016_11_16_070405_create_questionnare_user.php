<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnareUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnare_user', function (Blueprint $table) {
            $table->integer('user_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('questionnare_id')->default(0);
            $table->boolean('is_answered')->default(0);
            $table->boolean('is_back_later')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnare_user');
    }
}
