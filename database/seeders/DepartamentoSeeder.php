<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        // ⚠️ Deshabilitar las claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vaciar la tabla de forma segura
        Departamento::truncate();

        // Habilitar las claves foráneas nuevamente
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insertar los datos
        Departamento::insert([
            ['id' => 1, 'nombre' => 'Departamento de Informática'],
            ['id' => 2, 'nombre' => 'Departamento de Electrónica'],
            ['id' => 3, 'nombre' => 'Departamento de Lengua y Literatura'],
            ['id' => 4, 'nombre' => 'Departamento de Salud'],
            ['id' => 5, 'nombre' => 'Departamento de Geografía e Historia'],
            ['id' => 6, 'nombre' => 'Departamento de Educación Física'],
            ['id' => 7, 'nombre' => 'Departamento de Publicidad'],
            ['id' => 8, 'nombre' => 'Departamento de Calidad'],
        ]);
    }
}
