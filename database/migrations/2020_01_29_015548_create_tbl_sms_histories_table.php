<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSmsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sms_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from');
            $table->longText('message');
            $table->timestamps();
            $table->unsignedInteger('tbl_event_id');
            $table->unsignedInteger('user_id');
            $table->foreign('tbl_event_id')->references('id')->on('tbl_events');
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sms_histories');
    }
}
