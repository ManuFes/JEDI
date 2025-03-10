<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    use HasFactory;

    // Permitir la asignación masiva de estos campos
    protected $fillable = ['nombre', 'calle', 'numero', 'cp'];
}
