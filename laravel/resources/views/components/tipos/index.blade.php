<h1>Lista de Tipos de Productos</h1>

<meta name="csrf-token" content="{{ csrf_token() }}">

<form id="tipoForm">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <label>Activo:</label>
    <select name="active">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
    <button type="submit">Crear tipo</button>
</form>

<pre id="jsonResponse"></pre>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tipoTableBody">
        @foreach ($tipos as $tipo)
            <tr data-id="{{ $tipo->id }}"">
                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->nombre }}</td>
                <td>
                    <button class="editar-btn">Editar</button>
                    <button class="eliminar-btn">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

<script src="{{ asset('js/tipoProducto.js') }}"></script>
