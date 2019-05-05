<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
     protected $table = "transaksi";
     protected $primaryKey = 'transaksi_id';
     protected $fillable = [
        'customer_id','kode_qrcode','harga','status','no_plat','tgl_keluar','kategori_id'
    ];

    public function get_kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id','kategori_id');
    }


}
