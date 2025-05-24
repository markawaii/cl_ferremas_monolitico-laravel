@extends('layout.app')

@section('content')
    <div class="container-fluid">

        <div class="mt-4 pb-3 d-flex align-items-center">
            <span class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                <i class="ti ti-shopping-cart fs-6"></i>
            </span>
            <div class="ms-3">
                <h5 class="mb-0 fw-bolder fs-4">Top Sales</h5>
                <span class="text-muted fs-3">Johnathan Doe</span>
            </div>
            <div class="ms-auto">
                <span class="badge bg-secondary-subtle text-muted">+68%</span>
            </div>
        </div>

    </div>
@endsection
