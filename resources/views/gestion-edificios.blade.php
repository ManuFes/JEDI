@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">{{ __('Gestión de Edificios') }} - {{ $departamento->nombre }}</h1>

    <!-- Mostrar mensajes de error personalizados -->
    <x-error-alert :errors="$errors" />

    <!-- Opciones de Gestión -->
    <div class="d-flex justify-content-between my-3">
        <a href="{{ route('asociar-edificio', $departamento->id) }}" class="btn btn-primary">➕ {{ __('Asociar Edificio') }}</a>
        <a href="{{ route('main') }}" class="btn btn-secondary">🏠 {{ __('Volver') }}</a>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">🚪 {{ __('Logout') }}</button>
        </form>
    </div>

    <!-- Tabla de Edificios Asociados -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h4>{{ __('Edificios Asignados') }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>{{ __('Nombre del Edificio') }}</th>
                        <th>{{ __('Dirección') }}</th>
                        <th>{{ __('Nº de Despachos') }}</th>
                        <th>{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($edificios as $item)
                        <tr>
                            <td>{{ $item->edificio->nombre }}</td>
                            <td>{{ $item->edificio->calle }}, Nº{{ $item->edificio->numero }}</td>
                            <td>
                                <form action="{{ route('actualizar-despachos', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="despachos" value="{{ $item->despachos }}" min="0" max="5" class="form-control d-inline w-50">
                                    <button type="submit" class="btn btn-success">✅</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('eliminar-asociacion', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('¿Eliminar esta asociación?') }}')">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
