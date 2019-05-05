<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
     protected $table = "pricing";
     protected $primaryKey = 'id';
	 protected $fillable = [
        'kategori_id','harga','customer_id'
     ];
	 
	 public function getKategori(){
        return $this->belongsTo('\App\Model\Kategori', 'kategori_id', 'id');
    }
}
