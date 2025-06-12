@extends('layout.app')

@section('title', 'Detalle de Marca')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold text-dark mb-4">Detalle de Marca</h2>

        <div class="card shadow-sm p-4">
            <p><strong>ID:</strong>{{ $marca['id'] }}</p>
            <p><strong>Nombre:</strong>{{ $marca['name'] }}</p>
            <p><strong>Descripción:</strong>{{ $marca['description'] ?? 'Sin Descripción'}} </p>
            <p>
                <strong>Estado:</strong>
                @if ($marca['active'])
                    <span class="badge bg-success">Activa</span>
                @else
                    <span class="badge bg-danger">Inactiva</span>
                @endif
            </p>

            <a href="{{ route('admin.marca.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
        </div>
    </div>
@endsection
