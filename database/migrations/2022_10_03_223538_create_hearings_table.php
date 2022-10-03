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
        Schema::create('hearings', function (Blueprint $table) {
            $table->id('hearing_id');
            $table->dateTime('date_of_meeting', $precision = 0)->nullable();
            $table->dateTime('date_filed', $precision = 0)->nullable();
            $table->bigInteger('settlement_id')->unsigned()->nullable();
            $table->bigInteger('award_id')->unsigned()->nullable();
            $table->bigInteger('hearing_type_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('settlement_id')->references('settlement_id')->on('amicable_settlements')->onDelete('cascade');
            $table->foreign('award_id')->references('award_id')->on('arbitration_awards')->onDelete('cascade');
            $table->foreign('hearing_type_id')->references('hearing_type_id')->on('hearing_types')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hearings');
    }
};
