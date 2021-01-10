<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBarangaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_barangays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barangay_name');
            $table->timestamps();
            $table->unsignedInteger('tbl_town_id');
            //Relations
            $table->foreign('tbl_town_id')->references('id')->on('tbl_towns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_barangays');
    }
}
