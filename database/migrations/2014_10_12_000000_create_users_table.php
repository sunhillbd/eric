<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name')->nullable();
            $table->timestamps();
        });
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_name')->nullable();
            $table->string('description')->nullable();
            $table->double('price')->unique();
            $table->string('plan_uid')->nullable();
            $table->integer('plan_type_id')->default(0);
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('plan_id');
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->string('coupon_code')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->boolean('is_charged')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('subscriptions', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('stripe_plan')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();
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
        Schema::dropIfExists('plan_types');
        Schema::dropIfExists('plans');
        Schema::dropIfExists('users');
        Schema::dropIfExists('subscriptions');
    }
}
