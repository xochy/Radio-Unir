<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('theme');
            $table->string('url');
            $table->string('date');
            $table->string('hour');
            $table->string('slug');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('station_id')->unsigned();   
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('transmissions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transmissions');
    }
}