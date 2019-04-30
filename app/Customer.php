<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $table = "customer";
     protected $primaryKey = 'id_customer';
     protected $fillable = [
        'id_user','nama_place', 'address', 'latitude','longitude','img','status'
     ];

}   