<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoEdificio extends Model
{
    use HasFactory;

    protected $table = 'departamento_edificios'; // Nombre correcto de la tabla

    protected $fillable = ['idDep', 'idEdi', 'despachos'];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class, 'idEdi', 'id');
    }
}
