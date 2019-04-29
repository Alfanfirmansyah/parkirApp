<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
     protected $table = "transaksi";
     protected $primaryKey = 'id_transaksi';
     protected $fillable = [
        'id_user','kode_qrcode','tgl_masuk','id_pricing','status','no_plat','tgl_keluar',
    ];
}
