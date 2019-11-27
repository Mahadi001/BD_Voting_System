<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContituenciesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contituencies_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('thana_id');
            $table->integer('constituenceies_id');
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
        Schema::dropIfExists('contituencies_details');
    }
}
