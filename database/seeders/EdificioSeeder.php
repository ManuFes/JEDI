<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Edificio;

class EdificioSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Edificio::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Edificio::insert([
            ['id' => 1, 'nombre' => 'Edificio A', 'calle' => 'Calle 1', 'numero' => 10, 'cp' => 29001],
            ['id' => 2, 'nombre' => 'Edificio B', 'calle' => 'Calle 2', 'numero' => 20, 'cp' => 18002],
            ['id' => 3, 'nombre' => 'Edificio C', 'calle' => 'Calle 3', 'numero' => 30, 'cp' => 14003],
        ]);
    }
}
