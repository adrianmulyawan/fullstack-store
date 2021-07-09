@extends('layouts.dashboard')

@section('title', 'Dashboard Create Products')

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <!-- Create Product dan descrition -->
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create Products</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>
        <!-- Form Add Product -->
        <div class="dashboard-content">
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
                    <form action="{{ route('dashboard-products-store') }}" method="POST" enctype="multipart/form-data">
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
                                            />
                                        </div>
                                    </div>
                                    <!-- Product Category -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select id="category" class="form-control" name="categories_id">
                                                <option selected disabled>
                                                    Select Category
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
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- Product Thumbnail -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnail</label>
                                            <input
                                                type="file"
                                                class="form-control"
                                                id="thumbnail"
                                                name="photo"
                                            />
                                            <p class="text-muted">
                                                Kamu dapat memilih lebih dari satu file
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Save -->
                                <div class="row">
                                    <div class="col text-right">
                                        <button
                                            type="submit"
                                            class="btn btn-success px-5"
                                        >
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
@endpush