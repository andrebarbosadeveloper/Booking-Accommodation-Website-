<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comodidades extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'casa_id',
        'tv',
        'wifi',
        'ar'
    ];
    protected $table = "comodidades";
}
