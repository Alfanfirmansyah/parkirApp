<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
     protected $table = "transaksi";
     protected $primaryKey = 'id_transaksi';
     protected $fillable = [
        'id_customer','kode_qrcode','harga','status','no_plat','tgl_keluar','id_kategori'
    ];

    public function get_kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
