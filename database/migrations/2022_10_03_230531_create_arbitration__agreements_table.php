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
        Schema::create('arbitration_agreements', function (Blueprint $table) {
            $table->id('agreement_id');
            $table->bigInteger('hearing_id')->unsigned()->nullable();
            $table->dateTime('date_made', $precision = 0)->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('arbitration__agreements');
    }
};
