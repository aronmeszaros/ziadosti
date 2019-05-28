<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('name');
            $table->string('caption');
            $table->string('values')->nullable();
            $table->string('various_data')->nullable();
            $table->longtext('textarea_data')->nullable();
            $table->integer('number')->nullable();
            $table->date('date_data')->nullable();
            $table->integer('rows')->nullable();
            $table->integer('cols')->nullable();
            $table->string('onclick')->nullable();
            $table->integer('ziadost_id');
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
        Schema::dropIfExists('data');
    }
}
