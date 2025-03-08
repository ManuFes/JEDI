<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edificio;

class EdificiosController extends Controller
{
    /**
     * Muestra el listado de todos los edificios.
     */
    public function index()
    {
        $edificios = Edificio::all();
        return view('gestion-edificios-general', compact('edificios'));
    }

    /**
     * Muestra el formulario para crear un nuevo edificio.
     */
    public function create()
    {
        return view('nuevo-edificio');
    }

    /**
     * Almacena un nuevo edificio en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'calle'  => 'required|string|max:255',
            'numero' => 'required|integer',
            'cp'     => [
                'required',
                'digits:5',
                function ($attribute, $value, $fail) {
                    // El código postal debe comenzar por 29, 18 o 14
                    if (!preg_match('/^(29|18|14)/', $value)) {
                        $fail('El código postal debe comenzar por 29, 18 o 14.');
                    }
                },
            ],
        ]);

        Edificio::create($validated);

        // Se redirige a la ruta correcta
        return redirect()->route('gestion-edificios-general')->with('success', 'Edificio creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un edificio existente.
     */
    public function edit($id)
    {
        $edificio = Edificio::findOrFail($id);
        return view('editar-edificio', compact('edificio'));
    }

    /**
     * Actualiza la información del edificio seleccionado.
     */
    public function update(Request $request, $id)
    {
        $edificio = Edificio::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'calle'  => 'required|string|max:255',
            'numero' => 'required|integer',
            'cp'     => [
                'required',
                'digits:5',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^(29|18|14)/', $value)) {
                        $fail('El código postal debe comenzar por 29, 18 o 14.');
                    }
                },
            ],
        ]);

        $edificio->update($validated);

        return redirect()->route('gestion-edificios-general')->with('success', 'Edificio actualizado correctamente.');
    }

    /**
     * Elimina un edificio de la base de datos.
     */
    public function destroy($id)
    {
        $edificio = Edificio::findOrFail($id);
        $edificio->delete();

        return redirect()->route('gestion-edificios-general')->with('success', 'Edificio eliminado correctamente.');
    }
}
