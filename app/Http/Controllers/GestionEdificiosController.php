<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\DepartamentoEdificio;
use App\Models\Edificio;

class GestionEdificiosController extends Controller
{
    public function index($id)
    {
        $departamento = Departamento::findOrFail($id);
        $edificios = DepartamentoEdificio::where('idDep', $id)
                     ->with('edificio')
                     ->get();

        return view('gestion-edificios', compact('departamento', 'edificios'));
    }

    public function asociarEdificio($id)
    {
        $departamento = Departamento::findOrFail($id);
        $edificiosDisponibles = Edificio::whereNotIn('id', function ($query) use ($id) {
            $query->select('idEdi')
                  ->from('departamento_edificios')
                  ->where('idDep', $id);
        })->get();

        return view('asociar-edificio', compact('departamento', 'edificiosDisponibles'));
    }

    public function guardarAsociacion(Request $request)
    {
        $request->validate([
            'idDep' => 'required|exists:departamentos,id',
            'idEdi' => 'required|exists:edificios,id',
            'despachos' => 'required|integer|min:1|max:5',
        ]);

        DepartamentoEdificio::create($request->all());

        return redirect()->route('gestion-edificios', ['id' => $request->idDep])
            ->with('success', 'Edificio asociado correctamente.');
    }

    public function actualizarDespachos(Request $request, $id)
    {
        $request->validate([
            'despachos' => 'required|integer|min:0|max:5',
        ]);

        $relacion = DepartamentoEdificio::findOrFail($id);

        if ($request->despachos == 0) {
            // Si el número de despachos es 0, eliminamos la asociación
            $relacion->delete();
            return redirect()->back()->with('success', 'Asociación eliminada.');
        }

        $relacion->update(['despachos' => $request->despachos]);
        return redirect()->back()->with('success', 'Número de despachos actualizado.');
    }

    public function eliminarAsociacion($id)
    {
        DepartamentoEdificio::destroy($id);
        return redirect()->back()->with('success', 'Asociación eliminada.');
    }
}
