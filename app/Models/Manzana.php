<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipoManzana',
        'precioKilo'
    ];
    protected $table = 'manzanas';
    public $timestamps = false;
}
