<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->tinyInteger('no_code')->default(1)->comment('0=>other iran 1=>iraninan');
            $table->string('national_code')->nullable();
            $table->string('mobile',15);
            $table->string('phone')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->tinyInteger('gender')->nullable()->comment('0=>male 1=>female');
            $table->integer('country')->nullable();
            $table->integer('state')->nullable();
            $table->integer('city')->nullable();
            $table->string('address')->nullable();
            $table->string('post_code')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
