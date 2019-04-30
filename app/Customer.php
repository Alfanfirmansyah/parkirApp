<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $table = "customer";
     protected $primaryKey = 'id_customer';
     protected $fillable = [
          'nama_customer', 'address','tgl_bergabung','latitude','longitude','image'
     ];

}   