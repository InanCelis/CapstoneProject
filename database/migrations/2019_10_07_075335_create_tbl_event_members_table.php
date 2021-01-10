<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblEventMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_name')->nullable();
            $table->string('member_id_picture')->nullable()->unique();
            $table->timestamps();
            $table->unsignedInteger('tbl_event_registration_id');
            $table->foreign('tbl_event_registration_id')->references('id')->on('tbl_event_registrations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_event_members');
    }
}
