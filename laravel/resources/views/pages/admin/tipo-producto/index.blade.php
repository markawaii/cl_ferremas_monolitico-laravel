@extends('layout.app')

@section('title', 'Tipos de Producto')

@section('content')

    <div class="container py-4">
        {{-- Encabezado --}}
        <div class="row mb-3 align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-dark">Tipos de Producto</h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('admin.tipo.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Crear Tipo de Producto
                </a>
            </div>
        </div>

        {{-- Tabla --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo['id'] }}</td>
                            <td class="text-start">{{ $tipo['nombre'] }}</td>
                            <td>
                                @if ($tipo['active'])
                                    <span class="badge bg-success px-3 py-2">Activo</span>
                                @else
                                    <span class="badge bg-danger px-3 py-2">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.tipo.edit', $tipo['id']) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.tipo.destroy', $tipo['id']) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger btn-outline-danger"
                                            onclick="return confirm('¿Deseas eliminar este tipo de producto?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted py-4">No hay tipos de productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
