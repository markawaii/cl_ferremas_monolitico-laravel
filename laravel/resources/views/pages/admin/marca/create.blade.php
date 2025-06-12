@extends('layout.app')

@section('title', 'Crear Marca')


@section('content')

    <div class="container py-4">
        <h2 class="fw-bold text-dark mb-4">Crear Marca</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.marca.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la Marca</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="active" id="active" checked>
                <label class="form-check-label" for="active">Marca Activa</label>
            </div>

            <button type="submit" class="btn btn-success">Guardar Marca</button>
        </form>

    </div>

@endsection
