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
        Schema::create('case_involved', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('case_no')->unsigned()->nullable();
            $table->bigInteger('complainant_id')->unsigned()->nullable();
            $table->bigInteger('respondent_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('case_no')->references('case_no')->on('blotter_report')->onDelete('cascade');
            $table->foreign('complainant_id')->references('person_id')->on('person')->onDelete('cascade');
            $table->foreign('respondent_id')->references('person_id')->on('person')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_involved');
    }
};
