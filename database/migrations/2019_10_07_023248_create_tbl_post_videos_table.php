<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPostVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_post_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_videos')->nullable()->unique();
            $table->timestamps();
            $table->unsignedInteger('tbl_post_id');
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
        Schema::dropIfExists('tbl_post_videos');
    }
}
