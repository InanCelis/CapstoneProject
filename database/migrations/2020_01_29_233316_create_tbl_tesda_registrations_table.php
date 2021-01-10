<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblTesdaRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tesda_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('elementary_name')->nullable();
            $table->string('elementary_year')->nullable();
            $table->string('elementary_academic')->nullable();
            $table->string('secondary_name')->nullable();
            $table->string('secondary_year')->nullable();
            $table->string('secondary_academic')->nullable();
            $table->string('vocational_name')->nullable();
            $table->string('vocational_year')->nullable();
            $table->string('vocational_academic')->nullable();
            $table->string('college_name')->nullable();
            $table->string('college_year')->nullable();
            $table->string('college_academic')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('student')->nullable();
            $table->tinyInteger('microsoft_office')->nullable();
            $table->tinyInteger('microsoft_excel')->nullable();
            $table->tinyInteger('powerpoint')->nullable();
            $table->tinyInteger('adobe_photoshop')->nullable();
            $table->tinyInteger('adobe_premiere')->nullable();
            $table->longText('other_specify')->nullable();
            $table->string('user_picture')->nullable()->unique();
            $table->longText('remarks')->nullable();
            $table->tinyInteger('tesda_status')->default(1);
            $table->tinyInteger('sms_status')->default(1);
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tbl_batch_id')->nullable();
            $table->string('schedule');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tbl_batch_id')->references('id')->on('tbl_batches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tesda_registrations');
    }
}
