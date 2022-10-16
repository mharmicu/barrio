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
        Schema::create('court_actions', function (Blueprint $table) {
            $table->id('court_action_id');
            $table->dateTime('date_filed', $precision = 0)->nullable();
            $table->bigInteger('case_no')->unsigned()->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('court_actions');
    }
};
