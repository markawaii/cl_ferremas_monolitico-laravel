@extends('layout.app')

@section('title', 'Editar Tipos de Producto')

@section('content')

 <div class="container py-4">
        <h2 class="fw-bold text-dark mb-4">Editar Tipo de Producto</h2>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.tipo.update', $tipo['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de el Tipo de Producto</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $tipo['nombre']) }}" required>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="active" id="active" {{ $tipo['active'] ? 'checked' : '' }}>
                <label class="form-check-label" for="active">Tipo de Producto Activo</label>
            </div>

            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </form>
    </div>

@endsection
