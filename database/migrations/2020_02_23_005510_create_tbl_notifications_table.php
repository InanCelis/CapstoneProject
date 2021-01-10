<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message')->nullable();
            $table->tinyInteger('notif_type');
            $table->tinyInteger('unread')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->unsignedInteger('to_id');
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
        Schema::dropIfExists('tbl_notifications');
    }
}
