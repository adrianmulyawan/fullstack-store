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
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                    href="dashboard-products-details.html"
                    class="card card-dashboard-product d-block"
                >
                    <div class="card-body">
                    <img
                        src="/images/my-products/my-product1.png"
                        class="w-100 mb-2"
                    />
                    <div class="product-title">Shirup Marzzan</div>
                    <div class="product-category">Foods</div>
                    </div>
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                    href="dashboard-products-details.html"
                    class="card card-dashboard-product d-block"
                >
                    <div class="card-body">
                    <img
                        src="/images/my-products/my-product2.png"
                        class="w-100 mb-2"
                    />
                    <div class="product-title">Shirup Marzzan</div>
                    <div class="product-category">Foods</div>
                    </div>
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                    href="dashboard-products-details.html"
                    class="card card-dashboard-product d-block"
                >
                    <div class="card-body">
                    <img
                        src="/images/my-products/my-product3.png"
                        class="w-100 mb-2"
                    />
                    <div class="product-title">Shirup Marzzan</div>
                    <div class="product-category">Foods</div>
                    </div>
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                    href="dashboard-products-details.html"
                    class="card card-dashboard-product d-block"
                >
                    <div class="card-body">
                        <img
                            src="/images/my-products/my-product4.png"
                            class="w-100 mb-2"
                        />
                        <div class="product-title">Shirup Marzzan</div>
                        <div class="product-category">Foods</div>
                    </div>
                </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                    href="dashboard-products-details.html"
                    class="card card-dashboard-product d-block"
                >
                    <div class="card-body">
                        <img
                            src="/images/my-products/my-product5.png"
                            class="w-100 mb-2"
                        />
                        <div class="product-title">Shirup Marzzan</div>
                        <div class="product-category">Foods</div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection