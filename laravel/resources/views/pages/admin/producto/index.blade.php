@extends('layout.app')

@section('title', 'Productos en Blade')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Lista de Productos</h2>

        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $producto['name'] }}</h5>
                            <p class="card-text text-success fw-semibold mb-1">Precio: ${{ number_format($producto['price'], 0, ',', '.') }}</p>
                            <p class="text-muted small mb-2">{{ $producto['description']}}</p>
                            <div class="mb-2">
                                <span class="badge bg-primary me-1">Stock: {{ $producto['stock'] }}</span>
                                <span class="badge bg-primary">SKU: {{ $producto['sku'] }}</span>
                            </div>
                            <p class="text-muted mb-0">Marca: {{ $producto['marca']['name']}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
{{-- <div class="container-fluid">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>@social</td>
                </tr>
            </tbody>
        </table>

    </div> --}}
{{-- <div class="col-4">
    <div class="p-3 m-2 bg-info text-white p-3">
        <h1>Lista de Productos</h1> <br>

    ];

            foreach ($productos as $producto) {
                echo "<p>{$producto['nombre']} - \${$producto['precio']}</p>";
            }
    </div>
</div> --}}
