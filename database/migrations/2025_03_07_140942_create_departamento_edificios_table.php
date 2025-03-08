<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('departamento_edificios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDep');
            $table->unsignedBigInteger('idEdi');
            $table->integer('despachos'); // <-- Verifica que esta columna esté presente
            $table->timestamps();

            $table->foreign('idDep')->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreign('idEdi')->references('id')->on('edificios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departamento_edificios');
    }
};
