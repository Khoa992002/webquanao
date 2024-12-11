<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $table = 'comments';
   protected $fillable = ['cmt','id_product','id_user','avatar', 'name','level'];

    
}
