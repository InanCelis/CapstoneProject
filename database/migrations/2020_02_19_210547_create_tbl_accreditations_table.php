<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAccreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_accreditations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name')->nullable();
            $table->string('town')->nullable();
            $table->string('type')->nullable();
            $table->string('member')->nullable();
            $table->string('letter_of_intent')->nullable()->unique();
            $table->string('organizational_structure')->nullable()->unique();
            $table->string('roster_of_member')->nullable()->unique();
            $table->string('organizational_profile')->nullable()->unique();
            $table->string('bylaws')->nullable()->unique();
            $table->string('program_and_project')->nullable()->unique();
            $table->string('logo')->nullable()->unique();
            $table->longText('remarks')->nullable();
            $table->string('date_accredited')->nullable();
            $table->string('date_of_expiration')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('tbl_accreditations');
    }
}
