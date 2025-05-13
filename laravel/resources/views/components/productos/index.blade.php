<form id="productoForm">
    <label>Nombre:</label>
    <input type="text" name="name" required>

    <label>Descripción:</label>
    <input type="text" name="description">

    <label>Precio:</label>
    <input type="number" name="price" step="0.01" required>

    <label>Stock:</label>
    <input type="number" name="stock" required>

    <label>SKU:</label>
    <input type="text" name="sku" required>

    <label>Marca:</label>
    <select name="brand_id">
        @foreach($marcas as $marca)
            <option value="{{ $marca->id }}">{{ $marca->name }}</option>
        @endforeach
    </select>

    <label>Tipo Producto:</label>
    <select name="type_id">
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
        @endforeach
    </select>

    <label>Activo:</label>
    <select name="active">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>

    <button type="submit">Crear Producto</button>
</form>

<pre id="jsonResponseProducto"></pre>

<table border="1">
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody id="productoTableBody">
        @foreach ($productos as $producto)
            <tr data-id="{{ $producto->id }}">
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->name }}</td>
                <td>
                    <button class="editar-producto">Editar</button>
                    <button class="eliminar-producto">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{ asset('js/producto.js') }}"></script>
