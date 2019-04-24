<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir', function (Blueprint $table) {
            $table->bigIncrements('id_parkir');
			$table->unsignedBigInteger('id_place');
			$table->foreign('id_place')->references('id_place')->on('place')->onDelete('cascade')->onUpdate('cascade');
			$table->unsignedBigInteger('id_type');
			$table->foreign('id_type')->references('id_type')->on('kendaraan')->onDelete('cascade')->onUpdate('cascade');
			$table->string('no_plat');
			$table->string('tgl_masuk');
			$table->string('tgl_keluar');
			$table->double('harga');
			$table->string('status');
			$table->unsignedBigInteger('id_user');
			$table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('parkir');
    }
}
