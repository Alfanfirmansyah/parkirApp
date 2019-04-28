<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
     protected $table = "pricing";
     protected $primaryKey = 'id_price';
	 protected $fillable = [
        'id_kategori','harga','id_user'
     ];
	 
	 public function getKategori(){
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }
}
