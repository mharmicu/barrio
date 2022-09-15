<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id('notice_id');
            $table->bigInteger('notified_by')->unsigned()->nullable();
            $table->dateTime('date_of_meeting', $precision = 0)->nullable();
            $table->bigInteger('case_no')->unsigned()->nullable();
            $table->bigInteger('notice_type_id')->unsigned()->nullable();
            $table->boolean('notified')->nullable();
            $table->dateTime('date_filed', $precision = 0)->nullable();
            $table->dateTime('date_notified', $precision = 0)->nullable();
            $table->timestamps();

            $table->foreign('notified_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('case_no')->references('case_no')->on('blotter_report')->onDelete('cascade');
            $table->foreign('notice_type_id')->references('notice_type_id')->on('notice_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
    }
};
