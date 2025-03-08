<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class MainController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('main', compact('departamentos'));
    }

    public function store(Request $request)
{
    // Obtener todos los datos
    $data = $request->all();

    // Si se seleccionó "otro", forzamos departamento_id a null
    if (isset($data['departamento_id']) && $data['departamento_id'] === 'otro') {
        $data['departamento_id'] = null;
    }

    // Validación: Si no se selecciona un departamento, se requiere el campo nuevo_departamento
    $validated = \Validator::make($data, [
        'departamento_id'    => 'nullable|exists:departamentos,id',
        'nuevo_departamento' => 'nullable|string|max:255|required_without:departamento_id',
    ])->validate();

    if ($validated['departamento_id']) {
        return redirect()->route('gestion-edificios', ['id' => $validated['departamento_id']]);
    }

    if (!empty($validated['nuevo_departamento'])) {
        $nuevoDep = Departamento::create(['nombre' => $validated['nuevo_departamento']]);
        return redirect()->route('gestion-edificios', ['id' => $nuevoDep->id])
            ->with('success', 'Departamento creado correctamente.');
    }

    return redirect()->route('main')->withErrors('Selecciona un departamento o ingresa uno nuevo.');
}

}
