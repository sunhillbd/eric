<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('document_name')->nullable();
            $table->boolean('is_translated')->default(false);
            $table->boolean('is_in_english')->default(false);
        });
        Schema::create('documentals', function (Blueprint $table) {

            $table->integer('user_id');
            $table->integer('document_id')->default(0);
            $table->integer('documental_id')->default(0);
            $table->string('document_type')->nullable();
            $table->string('documental_type')->nullable();
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
        Schema::dropIfExists('documents');
        Schema::dropIfExists('documentals');
    }
}
