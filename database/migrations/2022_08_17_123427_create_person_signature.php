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
        Schema::create('person_signature', function (Blueprint $table) {
            $table->id('file_id');
            $table->string('file_address')->nullable();
            $table->bigInteger('person_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('person_id')->references('person_id')->on('person')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_signature');
    }
};
