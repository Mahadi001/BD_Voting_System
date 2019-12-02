<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('election_id');
            $table->integer('position');
            $table->integer('position_name');
            $table->string('zone_type');
            $table->string('zone');
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
        Schema::dropIfExists('election_details');
    }
}
