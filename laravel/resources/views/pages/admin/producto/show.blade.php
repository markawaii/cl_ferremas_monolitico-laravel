@extends('layout.app')

@section('title', 'Ver Producto')

@section('content')

    <div class="container mt-4">
        <h2>Detalles del Producto</h2>

        <ul class="list-group">
            <li class="list-group-item"><strong>Nombre: </strong> {{ $producto['name'] }}</li>
            <li class="list-group-item"><strong>Precio: </strong> ${{ number_format($producto['price'], 0, ',', '.') }}</li>
            <li class="list-group-item"><strong>Descripción: </strong> {{ $producto['description'] }}</li>
            <li class="list-group-item"><strong>Stock: </strong> {{ $producto['stock'] }}</li>
            <li class="list-group-item"><strong>SKU: </strong> {{ $producto['sku'] }}</li>
            <li class="list-group-item"><strong>Marca: </strong> {{ $producto['marca']['name'] ?? 'Sin marca asignada' }}
            </li>
            <li class="list-group-item"><strong>Tipo de Producto:
                </strong>{{ $producto['tipo']['nombre'] ?? 'Sin tipo asignado' }}</li>
            <li class="list-group-item"><strong>Activo:</strong> {{ $producto['active'] ? 'Sí' : 'No' }}</li>
        </ul>

        <hr class="my-4">
        <h3 class="mt-5">Historial de Precios</h3>
        @if (count($historial) > 0)
            <ul class="list-group mb-4">
                @foreach ($historial as $registro)
                    <li class="list-group-item">
                        <strong>${{ number_format($registro['price'], 0, ',', '.') }}</strong>
                        <small class="text-muted">({{ $registro['reason'] ?? 'Sin razón' }} -
                            {{ \Carbon\Carbon::parse($registro['created_at'])->diffForHumans() }})</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Sin historial de precios registrado.</p>
        @endif

        <a href="{{ route('admin.producto.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>

@endsection
