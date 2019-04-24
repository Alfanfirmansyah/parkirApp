<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place', function (Blueprint $table) {
            $table->bigIncrements('id_place');
			$table->unsignedBigInteger('id_user');
			$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->string('nama_place');
			$table->longText('address');
			$table->string('latitude');
			$table->string('longitude');
			$table->longText('img')->nullable;
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
        Schema::dropIfExists('place');
    }
}
