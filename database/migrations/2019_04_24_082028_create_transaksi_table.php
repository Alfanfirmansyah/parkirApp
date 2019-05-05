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
            $table->bigIncrements('transaksi_id');
			$table->string('kode_qrcode',50)->unique();
			$table->unsignedBigInteger('customer_id');
			$table->integer('kategori_id');
			$table->double('harga');
			$table->string('no_plat');
			$table->timestamp('tgl_masuk')->useCurrent();
			$table->string('tgl_keluar');
			$table->string('status');
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
