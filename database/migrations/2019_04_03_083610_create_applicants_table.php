<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ziadost_id');
            $table->integer('regisration_number')->nullable();
            $table->integer('statutory_representative_id')->nullable();
            $table->integer('contact_person_id')->nullable();
            $table->string('partner_description')->nullable();
            $table->integer('num_participants')->nullable();
            $table->integer('potential_partner_id')->nullable();
            $table->integer('partner_contact_person_id')->nullable();
            $table->string('partner_communication')->nullable();
            $table->string('partner_involvement')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
