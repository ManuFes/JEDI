<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DepartamentoEdificio;

class DepartamentoEdificioSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DepartamentoEdificio::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DepartamentoEdificio::insert([
            ['idDep' => 1, 'idEdi' => 1, 'despachos' => 3],
            ['idDep' => 2, 'idEdi' => 2, 'despachos' => 4],
            ['idDep' => 3, 'idEdi' => 3, 'despachos' => 2],
        ]);
    }
}
