@extends('layout.app')

@section('title', 'Lista de Productos')

@section('content')

    <style>
        .carousel-indicators [data-bs-target] {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #555;
            opacity: 0.6;
        }

        .carousel-indicators .active {
            background-color: #0d6efd;
            opacity: 1;
        }
    </style>

    <div class="container py-4">
        {{-- Carrusel superior --}}
        <div id="carouselProductos" class="carousel slide mb-5" data-bs-ride="carousel">
            {{-- Indicadores (círculos) --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselProductos" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselProductos" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselProductos" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselProductos" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>

            {{-- Imágenes del carrusel --}}
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <img src="{{ asset('img/banner/aire-acondicionado-split-muro.png') }}" class="d-block w-100"
                        alt="Aire Acondicionado">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner/ATORNILLADOR-BOSCH-BANNER.png') }}" class="d-block w-100"
                        alt="Bosch Atornillador">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner/BANNER-HERRAMIENTAS-ELECTRICAS-OFERTAS.jpg') }}" class="d-block w-100"
                        alt="Herramientas Eléctricas">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner/equipos-y-maquinarias-banner.jpg') }}" class="d-block w-100"
                        alt="Equipos y Maquinarias">
                </div>
            </div>
        </div>



        {{-- Grid de productos --}}
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($productos as $producto)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $producto->imagen ? asset('storage/' . $producto->imagen) : 'https://via.placeholder.com/300x200?text=Sin+Imagen' }}"
                            class="card-img-top" alt="{{ $producto->nombre }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text mb-1"><strong>Precio:</strong>
                                ${{ number_format($producto->precio, 0, ',', '.') }}</p>
                            <p class="card-text mb-1"><strong>Stock:</strong> {{ $producto->stock }}</p>
                            <p class="card-text mb-1"><strong>Marca:</strong> {{ $producto->marca }}</p>
                            <p class="card-text"><strong>SKU:</strong> {{ $producto->sku }}</p>
                        </div>
                        <div class="card-footer d-flex flex-column gap-2">
                            {{-- Botón para agregar al carrito --}}
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="cantidad" value="1">
                                <button class="btn btn-sm btn-outline-primary w-100" type="submit">
                                    <i class="fas fa-cart-plus me-1"></i> Agregar al carrito
                                </button>
                            </form>

                            {{-- Botón de compra inmediata --}}
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="cantidad" value="1">
                                <button class="btn btn-sm btn-success w-100" type="submit">
                                    <i class="fas fa-credit-card me-1"></i> Comprar ahora
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
