@extends('layout.app')

@section('title', 'Editar Producto')

@section('content')

    <div class="container-fluid">
        <h2>Editar Producto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.producto.update', $producto['id']) }}" method="POST">
            @csrf
            @method('PUT')


            <!-- Nombre Producto -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Producto</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $producto['name']) }}"
                    required>
            </div>

            <!-- Precio Producto -->

            <div class="mb-3">
                <label for='price' class="form-label">Precio del Producto</label>
                <input type="text" name="price" class="form-control" value="{{ old('price', $producto['price']) }}"
                    required>
            </div>
            <!-- Descripción Producto -->

            <div class="mb-3">
                <label for='description' class="form-label">Descripción del Producto</label>
                <input type="text" name="description" class="form-control"
                    value="{{ old('description', $producto['description']) }}" required>
            </div>

            <!-- Stock Producto -->

            <div class="mb-3">
                <label for='stock' class="form-label">Stock del Producto</label>
                <input type="text" name="stock" class="form-control" value="{{ old('stock', $producto['stock']) }}"
                    required>
            </div>

            <!-- SKU Producto -->

            <div class="mb-3">
                <label for='sku' class="form-label">SKU del Producto</label>
                <input type="text" name="sku" class="form-control" value="{{ old('sku', $producto['sku']) }}"
                    required>
            </div>

            <!-- Activo Producto checkbox -->

            <div class="mb-3 form-check">
                <input type="checkbox" name="active" id="active class="form-check-input"
                    {{ old('active', $producto['active']) ? 'checked' : '' }}">
                <label for='active' class="form-check-label">Activo</label>

            </div>

            <!-- Marca Producto -->

            <div class="mb-3">
                <label for="brand_id" class="form-label">Marca</label>
                <select name="brand_id" class="form-select" required>
                    <option value="">-- Selecciona una Marca --</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca['id'] }}"
                            {{ old('brand_id', $producto['brand_id']) == $marca['id'] ? 'selected' : '' }}>
                            {{ $marca['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>



@endsection
