@extends('layout.app')

@section('title', 'Lista de Productos')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Productos Registrados</h2>

    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>SKU</th>
                <th>Marca</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto['id'] }}</td>
                    <td>{{ $producto['name'] }}</td>
                    <td>${{ number_format($producto['price'], 0, ',', '.') }}</td>
                    <td>{{ $producto['stock'] }}</td>
                    <td>{{ $producto['sku'] }}</td>
                    <td>{{ $producto['brand_id']}}</td>
                    <td>
                        @if ($producto['active'])
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-secondary">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Ver</a>
                        <a href="#" class="btn btn-sm btn-info">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
