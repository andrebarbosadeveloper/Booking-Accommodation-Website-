<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagens extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'casa_id',
        'imagem',
        'numero'
    ];
    protected $table = "imagens";
}
