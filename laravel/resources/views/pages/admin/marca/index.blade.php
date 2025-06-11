@extends('layout.app')

@section('title', 'Lista de Marcas')

@section('content')
    <div class="container py-4">
        {{-- Encabezado --}}
        <div class="row mb-3 align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-dark">Marcas Registradas</h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('admin.marca.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Crear Marca
                </a>
            </div>
        </div>

        {{-- Tabla de marcas --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($marcas as $marca)
                        <tr>
                            <td>{{ $marca['id'] }}</td>
                            <td class="text-start">{{ $marca['name'] }}</td>
                            <td class="text-start">{{ $marca['description'] }}</td>
                            <td>
                                @if ($marca['active'])
                                    <span class="badge bg-success px-3 py-2">Activa</span>
                                @else
                                    <span class="badge bg-danger px-3 py-2">Inactiva</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Botón editar --}}
                                    <a href="{{ route('admin.marca.edit', $marca['id']) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Botón eliminar --}}
                                    <form action="{{ route('admin.marca.destroy', $marca['id']) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger btn-outline-danger"
                                            onclick="return confirm('¿Deseas eliminar esta marca?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted py-4">No hay marcas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
