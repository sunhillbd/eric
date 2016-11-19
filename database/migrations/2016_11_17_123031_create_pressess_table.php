<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('article_title')->nullable();
            $table->string('publication_name')->nullable();
            $table->timestamp('when_published')->nullable();
            $table->string('author_name')->nullable();
            $table->boolean('is_in_english')->default(0);
            $table->boolean('is_confirm')->default(0);
            $table->boolean('is_reviewed')->default(0);
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
        Schema::dropIfExists('presses');
    }
}
