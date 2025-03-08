@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Gestión Global de Edificios</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('edificios.create') }}" class="btn btn-primary mb-3">Nuevo Edificio</a>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>Nombre del Edificio</th>
                <th>Dirección</th>
                <th>Código Postal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($edificios as $edificio)
                <tr>
                    <td>{{ $edificio->nombre }}</td>
                    <td>{{ $edificio->calle }}, Nº{{ $edificio->numero }}</td>
                    <td>{{ $edificio->cp }}</td>
                    <td>
                        <a href="{{ route('edificios.edit', $edificio->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('edificios.destroy', $edificio->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar edificio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('main') }}" class="btn btn-secondary mt-3">
        {{ __('Volver') }}
    </a>
</div>
@endsection
