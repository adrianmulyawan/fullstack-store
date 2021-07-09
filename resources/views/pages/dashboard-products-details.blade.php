@extends('layouts.dashboard')

@section('title', 'Dashboard Products Details')

@section('content')
<!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
    <div class="container-fluid">
        <!-- Create Product dan descrition -->
        <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $product->name }}</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>
        <!-- Form Add Product -->
        <div class="dashboard-content">
            <!-- Card Row Product -->
            <div class="row">
                <div class="col-12">
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
                    <!-- Form -->
                    <form action="{{ route('dashboard-products-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <div class="card">
                            <div class="card-body">
                                <!-- Form Add Content -->
                                <div class="row">
                                <!-- Product Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="namaProduk">Product Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="name"
                                                value="{{ $product->name }}"
                                            />
                                        </div>
                                    </div>
                                    <!-- Product Price -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="hargaProduk">Product Price</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="price"
                                                value="{{ $product->price }}"
                                            />
                                        </div>
                                    </div>
                                    <!-- Product Category -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select id="category" class="form-control" name="categories_id">
                                                <option selected value="{{ $product->categories_id }}">
                                                    {{ $product->category->name }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="editor">Description</label>
                                        <textarea
                                            class="form-control"
                                            id="editor"
                                            rows="10"
                                            name="description"
                                        >
                                            {!! $product->description !!}
                                        </textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button Save -->
                                <div class="row">
                                    <div class="col text-right">
                                        <button
                                        type="submit"
                                        class="btn btn-block btn-success px-5"
                                        >
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end form -->
                </div>
            </div>

            <!-- Card Row Image Product -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($product->galleries as $gallery)
                                    <div class="col-md-4">
                                        <div class="gallery-container">
                                            <img
                                                src="{{ Storage::url($gallery->photos ?? '') }}"
                                                alt=""
                                                class="w-100"
                                            />
                                            <a href="{{ route('dashboard-products-gallery-delete', $gallery->id) }}" class="delete-gallery">
                                                <img src="/icon/ic_delete.svg" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Button Add Photo -->
                                <div class="col-12">
                                    <form action="{{ route('dashboard-products-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                                            <input
                                                type="file"
                                                name="photos"
                                                id="file"
                                                style="display: none"
                                                onchange="form.submit()"
                                            />
                                            <button
                                                type="button"
                                                class="btn btn-secondary btn-block mt-3"
                                                onclick="thisFileUpload()"
                                            >
                                                Add Photo
                                            </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<!-- Tambahkan CKEditor (Untuk Form Description) -->
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor");
</script>
<!-- Script jika button add now di click -->
<script>
    function thisFileUpload() {
        document.getElementById("file").click();
    }
</script>
@endpush