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
            <h2 class="dashboard-title">Shirup Marzan</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>
        <!-- Form Add Product -->
        <div class="dashboard-content">
            <!-- Card Row Product -->
            <div class="row">
                <div class="col-12">
                    <!-- Form -->
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
                            <!-- Image 1 -->
                            <div class="col-md-4">
                            <div class="gallery-container">
                                <img
                                src="/images/my-products/my-product1.png"
                                alt=""
                                class="w-100"
                                />
                                <a href="#" class="delete-gallery">
                                <img src="/icon/ic_delete.svg" alt="" />
                                </a>
                            </div>
                            </div>
                            <!-- Image 2 -->
                            <div class="col-md-4">
                            <div class="gallery-container">
                                <img
                                src="/images/my-products/my-product2.png"
                                alt=""
                                class="w-100"
                                />
                                <a href="#" class="delete-gallery">
                                <img src="/icon/ic_delete.svg" alt="" />
                                </a>
                            </div>
                            </div>
                            <!-- Image 3 -->
                            <div class="col-md-4">
                            <div class="gallery-container">
                                <img
                                src="/images/my-products/my-product3.png"
                                alt=""
                                class="w-100"
                                />
                                <a href="#" class="delete-gallery">
                                <img src="/icon/ic_delete.svg" alt="" />
                                </a>
                            </div>
                            </div>
                            <!-- Button Add Photo -->
                            <div class="col-12">
                            <input
                                type="file"
                                id="file"
                                style="display: none"
                                multiple
                            />
                            <button
                                class="btn btn-secondary btn-block mt-3"
                                onclick="thisFileUpload()"
                            >
                                Add Photo
                            </button>
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
    CKEDITOR.replace("descriptionProduct");
</script>
<!-- Script jika button add now di click -->
<script>
    function thisFileUpload() {
        document.getElementById("file").click();
    }
</script>
@endpush