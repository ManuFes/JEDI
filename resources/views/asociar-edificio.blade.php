@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">{{ __('Asignar Edificio al') }} {{ $departamento->nombre }}</h1>

    <x-error-alert :errors="$errors" />

    <form action="{{ route('guardar-asociacion') }}" method="POST">
        @csrf
        <input type="hidden" name="idDep" value="{{ $departamento->id }}">

        <div class="mb-3">
            <label for="idEdi" class="form-label">{{ __('Edificio:') }}</label>
            <select name="idEdi" class="form-control" required>
                @foreach ($edificiosDisponibles as $edificio)
                    <option value="{{ $edificio->id }}">{{ $edificio->nombre }} - {{ $edificio->calle }}, Nº{{ $edificio->numero }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="despachos" class="form-label">{{ __('Número de despachos:') }}</label>
            <input type="number" name="despachos" class="form-control" min="1" max="5" value="1" required>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
    </form>
</div>
@endsection
