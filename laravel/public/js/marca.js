document.getElementById('marcaForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/marcas', {
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
        document.getElementById('jsonResponseMarca').textContent = JSON.stringify(data, null, 2);

        if (data.status === 'success') {
            let row = `<tr data-id="${data.data.id}">
                <td>${data.data.id}</td>
                <td>${data.data.name}</td>
                <td>
                    <button class="editar-marca">Editar</button>
                    <button class="eliminar-marca">Eliminar</button>
                </td>
            </tr>`;
            document.getElementById('marcaTableBody').innerHTML += row;
        } else {
            alert('Error al crear marca');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al enviar');
    });
});

// Delegación de eventos para editar
document.getElementById('marcaTableBody').addEventListener('click', function(e) {
    if (e.target.classList.contains('editar-marca')) {
        let tr = e.target.closest('tr');
        let id = tr.dataset.id;
        let nuevoNombre = prompt('Nuevo nombre:', tr.querySelector('td:nth-child(2)').textContent);
        if (nuevoNombre) {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/marcas/${id}`, {
                method: 'PUT',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ name: nuevoNombre })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    tr.querySelector('td:nth-child(2)').textContent = data.data.name;
                    document.getElementById('jsonResponseMarca').textContent = JSON.stringify(data, null, 2);
                } else {
                    alert('Error al actualizar');
                }
            });
        }
    }

    // Delegación de eventos para eliminar
    if (e.target.classList.contains('eliminar-marca')) {
        let tr = e.target.closest('tr');
        let id = tr.dataset.id;
        if (confirm(`¿Seguro de eliminar la marca ${id}?`)) {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/marcas/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    tr.remove();
                    document.getElementById('jsonResponseMarca').textContent = JSON.stringify(data, null, 2);
                } else {
                    alert('Error al eliminar');
                }
            });
        }
    }
});
