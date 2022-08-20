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
        Schema::create('incident_case', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('article_no')->unsigned()->nullable();
            $table->bigInteger('case_no')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('article_no')->references('article_no')->on('kp_cases')->onDelete('cascade');
            $table->foreign('case_no')->references('case_no')->on('blotter_report')->onDelete('cascade');
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
