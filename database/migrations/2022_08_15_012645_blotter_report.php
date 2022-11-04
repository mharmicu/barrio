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
            $table->id('case_no')->from('2022000');
            $table->string('case_title')->nullable();
            $table->longText('complaint_desc')->nullable();
            $table->longText('relief_desc')->nullable();
            $table->dateTime('date_of_incident', $precision = 0)->nullable();
            $table->dateTime('date_reported', $precision = 0)->nullable();
            $table->bigInteger('processed_by')->unsigned()->nullable();
            $table->boolean('compliance');
            $table->dateTime('date_of_execution', $precision = 0)->nullable();
            $table->longText('remarks')->nullable();
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
