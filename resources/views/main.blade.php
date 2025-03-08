@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1>{{ __('Seleccionar Departamento') }}</h1>
    <!-- Mostrar mensajes de error personalizados -->
    <x-error-alert :errors="$errors" />

    <!-- Formulario para seleccionar o crear un nuevo departamento -->
    <form method="POST" action="{{ route('main.store') }}">
        @csrf

        <div class="mb-3">
            <label for="departamento_id" class="form-label">{{ __('Departamento') }}</label>
            <select id="departamento_id" name="departamento_id" class="form-select" onchange="toggleOtro(this)">
                <option value="">{{ __('Selecciona...') }}</option>
                @foreach($departamentos as $dep)
                    <option value="{{ $dep->id }}">{{ $dep->nombre }}</option>
                @endforeach
                <option value="otro">{{ __('Otro...') }}</option>
            </select>
        </div>

        <!-- Campo que se muestra solo si se elige la opción "otro" -->
        <div id="otro_div" class="mb-3" style="display: none;">
            <label for="nuevo_departamento" class="form-label">{{ __('Nuevo Departamento') }}</label>
            <input type="text" class="form-control" name="nuevo_departamento" id="nuevo_departamento">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
    </form>

    <!-- Botón para acceder a la gestión general de departamentos -->
    <a href="{{ route('gestion-edificios-general') }}" class="btn btn-secondary mt-3">
        {{ __('Gestión de Departamentos') }}
    </a>
</div>

<script>
function toggleOtro(selectObj) {
    const otroDiv = document.getElementById('otro_div');
    const nuevoDepInput = document.getElementById('nuevo_departamento');

    if (selectObj.value === "otro") {
        otroDiv.style.display = "block";
    } else {
        otroDiv.style.display = "none";
        nuevoDepInput.value = "";
    }
}
</script>
@endsection
