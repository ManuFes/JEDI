@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Crear Nuevo Edificio</h1>
    <x-error-alert :errors="$errors" />
    <form action="{{ route('edificios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Edificio:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="calle" class="form-label">Calle:</label>
            <input type="text" name="calle" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número:</label>
            <input type="number" name="numero" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cp" class="form-label">Código Postal:</label>
            <input type="text" name="cp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Crear Edificio</button>
    </form>
</div>
@endsection
