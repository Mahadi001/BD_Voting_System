<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('user_id')->comment('candidate id');
            $table->string('election_id');
            $table->string('election_type');
            $table->integer('position_id');
            $table->integer('position_name');
            $table->integer('subadmin_id')->comment('party id');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('upazilla_id');
            $table->integer('union_id');
            $table->integer('rmo_id');
            $table->integer('constituencies_id');
            $table->integer('approved_by_party')->default(0);
            $table->integer('approved_by_ec')->default(0);
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
        Schema::dropIfExists('candidate_requests');
    }
}
