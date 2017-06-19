<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableParkingCoordinates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_coordinates', function (Blueprint $table) {
	        $table->integer('parking_id')->unsigned()->index();
			$table->string('latitude');
			$table->string('longitude');

	        $table->foreign('parking_id')->references('id')->on('parkings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_coordinates');
    }
}
