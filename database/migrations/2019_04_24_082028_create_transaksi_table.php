<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
			$table->string('kode_qrcode',50)->unique();
			$table->unsignedBigInteger('id_customer');
			$table->unsignedBigInteger('id_pricing');
			$table->string('no_plat');
			$table->string('tgl_masuk');
			$table->string('tgl_keluar');
			$table->string('status');
			$table->unsignedBigInteger('id_user');
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
        Schema::dropIfExists('transaksi');
    }
}
