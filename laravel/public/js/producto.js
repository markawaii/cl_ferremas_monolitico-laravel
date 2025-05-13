document.getElementById('productoForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch('/productos', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CRSF-TOKEN': document.querySelector('meta[name="crsf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('jsonResponseProducto').textContent = JSON.stringify(data, null, 2);

        if (data.status === 'success') {
            let producto = data.data;

            let row =  `
                <tr data-id="${producto.id}></tr>
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
