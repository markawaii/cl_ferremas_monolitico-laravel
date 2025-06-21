@extends('layout.app')

@section('title', 'Crear Tipo de Producto')

@section('content')

    <div class="container py-4">
        <h2 class="fw-bold text-dark mb-4">Crear Tipo de Producto</h2>


        @if ($errors->any())
            <div class="aler alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.tipo.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Tipo de Producto</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="active" id="active" checked>
                <label class="form-check-label" for="active">Tipo Activo</label>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i> Guardar Tipo de Producto
            </button>
        </form>
    </div>

@endsection
