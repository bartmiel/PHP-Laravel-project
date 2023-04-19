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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('userid');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('city');
            $table->boolean('isadmin');
            $table->string('clubname');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('Users');
    }
};
