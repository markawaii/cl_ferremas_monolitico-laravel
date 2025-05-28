@extends('layout.app')

@section('title', 'Crear Producto')

@section('content')

    <div class="container-fluid">

        <div class="container mt-4">
            <h2>Crear Producto</h2>



            <form action="{{ route('admin.producto.create') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Producto</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="active" id="active" class="form-check-input" {{ old('active') ? 'checked': ''}}>
                    <label for="active" class="form-check-label">Activo</label>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}" required>
                </div>

                <div class="mb-3">
                    <label for="sku" class="form-label">SKU</label>
                    <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku') }}">
                </div>

                <div class="mb-3">
                    <label for="brand_id" class="form-label">Marca</label>
                    <select name="brand_id" id="brand_id" class="form-select" required>
                        <option value="">-- Seleccione una Marca --</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}"{{ old('brand_id') ==$marca->id ? 'selected': ''}}>
                                {{ $marca->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form_label">Tipo de Producto</label>
                    <select name="type_id" id="type_id" class="form-select" required>
                        <option value="">-- Seleccione un Tipo de Producto --</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}"{{ old('type_id') ==$tipo->id ? 'selected': ''}}>
                                {{ $tipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Producto</button>

            </form>
        </div>
    </div>

@endsection
