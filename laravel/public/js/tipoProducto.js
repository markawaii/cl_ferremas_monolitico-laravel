document.getElementById('tipoForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/tipos', {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        document.getElementById('jsonResponse').textContent = JSON.stringify(data, null, 2);

        if (data.status === 'success') {
            let row = `
                <tr data-id="z${data.data.id}">
                    <td>${data.data.id}</td>
                    <td>${data.data.nombre}</td>
                    <td>
                        <button class="editar-btn">Editar</button>
                        <button class="eliminar-btn">Eliminar</button>
                    </td>
                </tr>`;
            document.getElementById('tipoTableBody').innerHTML += row;
        } else {
            alert('Error al crear tipo');
        }
    })
    .catch(error => {
        console.error('Error:' , error);
        alert('Ocurrió un error al enviar');
    });
});

// Delegación de eventos para eliminar
document.getElementById('tipoTableBody').addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('eliminar-btn')) {
        let row = e.target.closest('tr');
        let id = row.getAttribute('data-id');
        if (confirm(`¿Seguro de eliminar tipo ${id}?`)) {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/tipos/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById('jsonResponse').textContent = JSON.stringify(data, null, 2);
                if (data.status === 'success') {
                    row.remove();
                } else {
                    alert('Error al eliminar');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al eliminar');
            });
        }
    }
});

// Delegación de eventos para editar
document.getElementById('tipoTableBody').addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('editar-btn')) {
        let row = e.target.closest('tr');
        let id = row.getAttribute('data-id');
        let nuevoNombre = prompt('Nuevo nombre:', row.children[1].textContent);
        if (nuevoNombre) {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/tipos/${id}`, {
                method: 'PUT',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ nombre: nuevoNombre, active: 1 })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById('jsonResponse').textContent = JSON.stringify(data, null, 2);
                if (data.status === 'success') {
                    row.children[1].textContent = data.data.nombre;
                } else {
                    alert('Error al actualizar');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al actualizar');
            });
        }
    }
});

