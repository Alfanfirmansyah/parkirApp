<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
     protected $table = "kategori";
     protected $primaryKey = 'id_kategori';
     protected $fillable = [
        'kendaraan'
    ];
	
	
	
	
}   