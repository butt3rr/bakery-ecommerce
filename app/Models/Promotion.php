<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotion'; // 
    protected $fillable = [
        'promotion_name',
        'description',
        'start_date',
        'end_date',
        'image'
    ];
}
