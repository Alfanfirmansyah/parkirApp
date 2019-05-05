<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
     protected $table = "pricing";
     protected $primaryKey = 'pricing_id';
	 protected $fillable = [
        'kategori_id','harga','customer_id'
     ];
	 
	 public function get_kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

  

}
