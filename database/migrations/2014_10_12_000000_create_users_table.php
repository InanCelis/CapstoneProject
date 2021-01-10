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
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('work')->nullable();
            $table->string('work_position')->nullable();
            $table->string('school')->nullable();
            $table->string('bio')->nullable();
            $table->string('profile_picture')->default('none');
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->tinyInteger('number_verified')->default(0);
            $table->string('number_code')->nullable()->unique();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('color_profile')->nullable();
            $table->tinyInteger('usertype')->default(0);
            $table->tinyInteger('status')->default(1);
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
