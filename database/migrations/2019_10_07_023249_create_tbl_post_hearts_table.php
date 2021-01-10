<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPostHeartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_post_hearts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->tinyInteger('heart_unread')->default(1);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tbl_post_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tbl_post_id')->references('id')->on('tbl_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_post_hearts');
    }
}
