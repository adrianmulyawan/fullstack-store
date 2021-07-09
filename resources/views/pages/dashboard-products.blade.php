@extends('layouts.dashboard')

@section('title', 'Dashboard Products')

@section('content')

<!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
    <div class="container-fluid">
        <!-- Teks My Product dan subtitle -->
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Products</h2>
            <p class="dashboard-subtitle">Manage it well and get money</p>
        </div>
        {{-- Laravel Flash Message --}}
        <div class="row">
            <p data-aos="fade-up" class="dashboard-title">
                @include('includes.flash-message')
            </p>
        </div>
        <!-- Content My Dashboard -->
        <div class="dashboard-content">
            <!-- Button Add New Product -->
            <div class="row">
                <div class="col-12">
                    <a
                        href="{{ route('dashboard-products-create') }}"
                        class="btn btn-success"
                    >
                        Add New Product
                    </a>
                </div>
            </div>
            <!-- Card Product -->
            <div class="row mt-4">
                @forelse ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a
                            href="{{ route('dashboard-products-details', $product->id) }}"
                            class="card card-dashboard-product d-block"
                        >
                            <div class="card-body">
                                <img
                                    src="{{ Storage::url($product->galleries->first()->photos ?? '') }}"
                                    class="w-100 mb-2"
                                />
                                <div class="product-title">
                                    {{ $product->name }}
                                </div>
                                <div class="product-category">
                                    {{ $product->category->name }}
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>
                            There is no product you added yet
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection