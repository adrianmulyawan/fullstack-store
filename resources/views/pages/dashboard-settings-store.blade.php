@extends('layouts.dashboard')

@section('title', 'Dashboard Settings Store')

@section('content')
<!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
    <div class="container-fluid">
    <!-- Teks dashboard dan subtitle -->
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Store Settings</h2>
        <p class="dashboard-subtitle">Make store that profitable</p>
    </div>
    <!-- Store Settings -->
    <div class="dashboard-content">
        <div class="row">
        <div class="col-12">
            <form action="#">
            <div class="card">
                <div class="card-body">
                <!-- Store Settings Content -->
                <div class="row">
                    <!-- Store Name -->
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaToko">Store Name</label>
                        <input
                        type="text"
                        class="form-control"
                        value="Toko Buku Gramedia"
                        />
                    </div>
                    </div>
                    <!-- Store Category -->
                    <div class="col-md-6">
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
                    <!-- Store Open/Close? -->
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Store Status</label>
                        <p class="text-muted">
                        Apakah saat ini toko Anda buka?
                        </p>
                        <div
                        class="
                            custom-control
                            custom-radio
                            custom-control-inline
                        "
                        >
                        <input
                            class="custom-control-input"
                            type="radio"
                            name="is_store_open"
                            id="openStoreTrue"
                            value="true"
                        />
                        <label
                            class="custom-control-label"
                            for="openStoreTrue"
                        >
                            Buka
                        </label>
                        </div>
                        <div
                        class="
                            custom-control
                            custom-radio
                            custom-control-inline
                        "
                        >
                        <input
                            class="custom-control-input"
                            type="radio"
                            name="is_store_open"
                            id="openStoreFalse"
                            value="false"
                        />
                        <label
                            class="custom-control-label"
                            for="openStoreFalse"
                        >
                            Sementara Tutup
                        </label>
                        </div>
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