<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('questionnare')->nullable();
            $table->timestamps();
        });

        Schema::create('category_questionnare', function (Blueprint $table) {
            $table->integer('category_id')->default(0);
            $table->integer('questionnare_id')->default(0);
            $table->boolean('is_active')->default(false);

        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->integer('questionnare_id')->default(0);
            $table->string('answer')->nullable();
            $table->boolean('is_submitted')->default(false);
            $table->boolean('is_reviewed')->default(false);
            $table->timestamps();
        });

        Schema::create('document_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_type')->nullable();

        });
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_type_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->string('file_name')->nullable();
//            $table->string('translated_file_name')->nullable();
            $table->boolean('is_submitted')->default(false);
            $table->boolean('is_reviewed')->default(false);
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
        Schema::dropIfExists('questionnares');
        Schema::dropIfExists('category_questionnare');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('document_types');
        Schema::dropIfExists('documents');
    }
}
