@extends('layout.app')

@section('title', 'Lista de Productos')

@section('content')
    <div class="container py-4">
        {{-- Encabezado --}}
        <div class="row mb-3 align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-dark">Productos Registrados</h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('admin.producto.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Crear Producto
                </a>
            </div>
        </div>

        {{-- Tabla de productos --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-light">
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
                    @forelse ($productos as $producto)
                        <tr>
                            <td>{{ $producto['id'] }}</td>
                            <td class="text-start">{{ $producto['name'] }}</td>
                            <td>${{ number_format($producto['price'], 0, ',', '.') }}</td>
                            <td>{{ $producto['stock'] }}</td>
                            <td>{{ $producto['sku'] }}</td>
                            <td>{{ $producto['marca']['name'] }}</td>
                            <td>
                                @if ($producto['active'])
                                    <span class="badge bg-success px-3 py-2">Activo</span>
                                @else
                                    <span class="badge bg-danger px-3 py-2">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.producto.show', $producto['id']) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.producto.edit', $producto['id']) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.producto.destroy', $producto['id']) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger btn-outline-danger"
                                            onclick="return confirm('¿Deseas eliminar este producto?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-muted py-4">No hay productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
