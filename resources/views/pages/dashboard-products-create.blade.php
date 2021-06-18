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
            <form action="#">
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
                            value="Rokpresso"
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
                            value="$100.00"
                        />
                        </div>
                    </div>
                    <!-- Product Category -->
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control">
                            <option selected disabled>
                            Select Category
                            </option>
                            <option>Furniture</option>
                            <option>Book</option>
                            <option>Gadget</option>
                        </select>
                        </div>
                    </div>
                    <!-- Product Description -->
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            class="form-control"
                            id="description"
                            rows="10"
                            name="descriptionProduct"
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
    CKEDITOR.replace("descriptionProduct");
</script>
@endpush