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
        Schema::create('case_hearings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('case_no')->unsigned()->nullable();
            $table->bigInteger('hearing_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('case_no')->references('case_no')->on('blotter_report')->onDelete('cascade');
            $table->foreign('hearing_id')->references('hearing_id')->on('hearings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_hearings');
    }
};
