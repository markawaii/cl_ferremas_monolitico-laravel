document.getElementById('productoForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch('/productos/crear', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('jsonResponseProducto').textContent = JSON.stringify(data, null, 2);

        if (data.status === 'success') {
            let producto = data.data;

            let row =  `
                <tr data-id="${producto.id}">
                    <td>${producto.id}</td>
                    <td>${producto.name}</td>
                    <td>
                        <button class="editar-producto">Editar</button>
                        <button class="eliminar-producto">Eliminar</button>
                    </td>
                </tr>`;

            document.getElementById('productoTableBody').innerHTML += row;
        } else {
            alert(data.message || 'Error al crear producto');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al crear el producto');
    });
});

document.getElementById('productoTableBody').addEventListener('click', function(e) {
    if (e.target.classList.contains('editar-producto')) {
        const tr = e.target.closest('tr');
        const id = tr.dataset.id;

        const nuevoNombre = prompt('Nuevo nombre:', tr.querySelector('td:nth-child(2)').textContent);
        const nuevoPrecio = prompt('Nuevo precio:');
        const nuevaDescripcion = prompt('Nueva descripción:');
        const nuevoStock = prompt('Nuevo stock:');
        const nuevoSku = prompt('Nuevo SKU:');
        const nuevoBrandId = prompt('Nuevo ID de marca:');
        const nuevoTypeId = prompt('Nuevo ID de tipo producto:');
        const activo = confirm('¿Activo?') ? 1 : 0;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const formData = new FormData();
        formData.append('name', nuevoNombre);
        formData.append('price', nuevoPrecio);
        formData.append('description', nuevaDescripcion);
        formData.append('stock', nuevoStock);
        formData.append('sku', nuevoSku);
        formData.append('active', activo);
        formData.append('brand_id', nuevoBrandId);
        formData.append('type_id', nuevoTypeId);
        formData.append('_method', 'PUT');
        formData.append('_token', csrfToken);

        fetch(`/productos/${id}/actualizar`, {
            method: 'POST',
            body: formData,
            headers: { 'Accept': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.id) {
                tr.querySelector('td:nth-child(2)').textContent = data.name;
                document.getElementById('jsonResponseProducto').textContent = JSON.stringify(data, null, 2);
                alert('Producto actualizado correctamente.');
            } else {
                alert('Error al actualizar producto.');
            }
        })
        .catch(error => {
            console.error('Error al actualizar:', error);
            alert('Error al actualizar.');
        });
    }
});
