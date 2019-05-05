<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
     protected $table = "customer";
     protected $primaryKey = 'customer_id';
     protected $fillable = [
          'name', 'address','tgl_bergabung','latitude','longitude','image'
     ];

}   