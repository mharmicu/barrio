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
        Schema::create('arbitration_awards', function (Blueprint $table) {
            $table->id('award_id');
            $table->dateTime('date_agreed', $precision = 0)->nullable();
            $table->longText('award_desc')->nullable();
            $table->bigInteger('made_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('made_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arbitration__awards');
    }
};
