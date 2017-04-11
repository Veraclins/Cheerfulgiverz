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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->integer('role_id')->default(1);
            $table->integer('activation_status');
            $table->string('profile_picture');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('company');
            $table->string('confirmation_code');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('branch_code');
            $table->string('account_holder');
            $table->integer('plan_id');
            $table->integer('cycle');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
