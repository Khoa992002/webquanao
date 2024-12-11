<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
   protected $table = 'rates';
   protected $fillable = ['rate','id_product','id_user','price'];

    
}
