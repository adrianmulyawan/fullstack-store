@extends('layouts.admin')

@section('title', 'Product Gallery')

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <!-- Teks dashboard dan subtitle -->
        <div class="dashboard-heading">
            <h2 class="dashboard-title">
                Product Gallery
            </h2>
            <p class="dashboard-subtitle">
                Create New Product Gallery
            </p>
        </div>
        {{-- Content Add Product --}}
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    {{-- Tambahkan Error Handling --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product-gallery.store') }}" method="post" enctype="multipart/form-data">
                                {{-- Form inputan --}}
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product</label>
                                            <select name="products_id" class="form-control">
                                                <option selected disabled>
                                                    Pilih Product
                                                </option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Photo</label>
                                            <input type="file" name="photos" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                {{-- Button Save --}}
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Save Data
                                        </button>
                                    </div>
                                </div>      
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection