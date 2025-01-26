<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  //  use HasFactory;

    //same as table in db
    protected $fillable = [
        'category_name',
    ];

}
