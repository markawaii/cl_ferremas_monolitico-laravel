<h1>Lista de Marcas</h1>

<meta name="csrf-token" content="{{ csrf_token() }}">

<form id="marcaForm">
    <label>Nombre:</label>
    <input type="text" name="name" required>
    <label>Activo:</label>
    <label>Descripción:</label>
        <input type="text" name="description" required>
    <select name="active">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
    <button type="submit">Crear Marca</button>
</form>

<pre id="jsonResponseMarca"></pre>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="marcaTableBody">
        @foreach ($marcas as $marca)
            <tr data-id="{{ $marca->id }}">
                <td>{{ $marca->id }}</td>
                <td>{{ $marca->name }}</td>
                <td>
                    <button class="editar-marca">Editar</button>
                    <button class="eliminar-marca">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="{{ asset('js/marca.js') }}"></script>
