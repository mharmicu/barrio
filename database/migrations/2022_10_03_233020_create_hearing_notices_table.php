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
        Schema::create('hearing_notices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('notice_id')->unsigned()->nullable();
            $table->bigInteger('hearing_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('notice_id')->references('notice_id')->on('notices')->onDelete('cascade');
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
        Schema::dropIfExists('hearing_notices');
    }
};
