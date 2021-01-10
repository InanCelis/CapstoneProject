<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblEventRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_of_group')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('color_of_hair')->nullable();
            $table->string('color_of_eyes')->nullable();
            $table->string('special_hobbies')->nullable();
            $table->string('employer')->nullable();
            $table->string('degree')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('wish_to_join')->nullable();
            $table->string('id_picture')->nullable()->unique();
            $table->longText('remarks')->nullable();
            $table->tinyInteger('event_registration_status')->default(1);
            $table->tinyInteger('event_registration_notification')->default(1);
            $table->tinyInteger('event_registration_reload')->default(1);
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tbl_event_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tbl_event_id')->references('id')->on('tbl_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_event_registrations');
    }
}
