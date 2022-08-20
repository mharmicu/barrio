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
        Schema::create('blotter_report', function (Blueprint $table) {
            $table->id('case_no');
            $table->string('case_title')->nullable();
            $table->string('complaint_desc')->nullable();
            $table->string('relief_desc')->nullable();
            $table->dateTime('date_of_incident', $precision = 0);
            $table->dateTime('date_reported', $precision = 0);
            $table->bigInteger('processed_by')->unsigned()->nullable();
            $table->boolean('compliance');
            $table->dateTime('date_of_execution', $precision = 0);
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('processed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
