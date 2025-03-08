<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    // Permitir asignación masiva del campo 'nombre'
    protected $fillable = ['nombre'];

    // Si deseas relaciones, puedes agregar:
    // public function departamentoEdificios()
    // {
    //     return $this->hasMany(DepartamentoEdificio::class, 'idDep');
    // }
}
