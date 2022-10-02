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
        Schema::create('witnesses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('case_no')->unsigned()->nullable();
            $table->bigInteger('witness_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('case_no')->references('case_no')->on('blotter_report')->onDelete('cascade');
            $table->foreign('witness_id')->references('person_id')->on('person')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('witnesses');
    }
};
