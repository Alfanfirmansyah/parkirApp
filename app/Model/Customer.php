<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $table = "customer";
     protected $primaryKey = 'id';
     protected $fillable = [
          'name', 'address','tgl_bergabung','latitude','longitude','image'
     ];

}   