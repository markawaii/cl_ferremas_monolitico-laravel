@extends('layout.app')

@section('title', 'Editar Producto')

@section('content')

<div class="container mt-4">
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

    <form action="{{ rotue('admin.producto.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Producto</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $producto->name) }}" required>
        </div>
    </form>
</div>



@endsection
