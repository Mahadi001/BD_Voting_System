<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('birthPlace');
            $table->string('birthCountry');
            $table->date('dateOfBirth');
            $table->string('fathername');
            $table->string('mothername');
            $table->double('height');
            $table->string('eyesColor');
            $table->string('sex');
            $table->double('telephone');
            $table->double('mobile');
            $table->double('emergencyContact');
            $table->string('address');
            $table->string('address2');
            $table->string('country');
            $table->string('state');
            $table->string('zip');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corrections');
    }
}
