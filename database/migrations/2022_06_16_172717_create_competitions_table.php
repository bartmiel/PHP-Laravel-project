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
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('competitionid');
            $table->string('name');
            $table->string('location');
            $table->string('description');
            $table->date('date');
            $table->time('time');
            $table->boolean('isregistrationactive');
            $table->boolean('isfinished');
            $table->boolean('isactive');
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
        Schema::dropIfExists('competitions');
    }
};
