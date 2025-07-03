@extends('layout.app')

@section('title', 'Editar Marca')


@section('content')

    <div class="container py-4">
        <h2 class="fw-bold text-dark mb-4">Editar Marca</h2>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.marca.update', $marca['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la Marca</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $marca['name']) }}" required>
            </div>

            <div>
                <label for="description" class="form-label">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ $marca['description'] }}">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="active" id="active"
                    {{ $marca['active'] ? 'checked' : '' }}>
                <label class="form-check-label" for="active">Marca Activa</label>
            </div>

            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </form>
    </div>

@endsection
