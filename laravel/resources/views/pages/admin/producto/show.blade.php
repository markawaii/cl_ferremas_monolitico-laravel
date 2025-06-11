@extends('layout.app')

@section('title', 'Ver Producto')

@section('content')

<div class="container mt-4">
    <h2>Detalles del Producto</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $producto['name'] }}</li>
        <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($producto['price'], 0, ',', '.') }}</li>
        <li class="list-group-item"><strong>Descripción:</strong> {{ $producto['description'] }}</li>
        <li class="list-group-item"><strong>Stock:</strong> {{ $producto['stock'] }}</li>
        <li class="list-group-item"><strong>SKU:</strong> {{ $producto['sku'] }}</li>
        <li class="list-group-item"><strong>Marca:</strong> {{ $producto['marca']['name'] }}</li>
        <li class="list-group-item"><strong>Activo:</strong> {{ $producto['active'] ? 'Sí' : 'No' }}</li>
    </ul>

    <a href="{{ route('admin.producto.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>

@endsection
