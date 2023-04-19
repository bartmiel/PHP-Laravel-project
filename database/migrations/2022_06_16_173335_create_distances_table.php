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
        Schema::create('distances', function (Blueprint $table) {
            $table->increments('distanceid');
            $table->integer('competitionid')->unsigned();
            $table->foreign('competitionid')->references('competitionid')->on('competitions')->onDelete('cascade');
            $table->string('name');
            $table->integer('distancelimit');
            $table->dateTime('creationdate');
            $table->dateTime('updatedate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distances');
    }
};
