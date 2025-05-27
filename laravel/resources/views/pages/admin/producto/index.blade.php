@extends('layout.app')

@section('content')
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
    <div class="col-4">
    <div class="p-3 m-2 bg-info text-white p-3">
        <h1>Lista de Productos</h1> <br>
        <?php
            $productos = [
                ['nombre' => 'Martillo', 'precio' => 5990],
                ['nombre' => 'Taladro', 'precio' => 5990],
                ['nombre' => 'Serrucho', 'precio' => 5990],
    ];

            foreach ($productos as $producto) {
                echo "<p>{$producto['nombre']} - \${$producto['precio']}</p>";
            }
        ?>
    </div>
</div>


@endsection
