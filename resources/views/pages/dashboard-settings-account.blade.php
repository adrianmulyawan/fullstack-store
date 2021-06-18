@extends('layouts.dashboard')

@section('title', 'Dashboard Settings Account')

@section('content')
<!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
    <div class="container-fluid">
        <!-- Teks My Account dan subtitle -->
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">Update your current profile</p>
        </div>
        <!-- Store My Account Content -->
        <div class="dashboard-content">
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="card">
                            <div class="card-body">
                                <!-- Contentn My Account -->
                                <div class="row">
                                    <!-- 1. Your Name & Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="Adrian Mulyawan"
                                        />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="email">Your Email</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="email"
                                            name="email"
                                            value="adrianmulyawan666@gmail.com"
                                        />
                                        </div>
                                    </div>

                                    <!-- 2. Address -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="addressOne">Address 1</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="addressOne"
                                            name="addressOne"
                                            value="Setra Duta Cemara"
                                        />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="addressTwo">Address 2</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="addressTwo"
                                            name="addressTwo"
                                            value="Blok B2 No 4"
                                        />
                                        </div>
                                    </div>

                                    <!-- 3. Province, City, Postal Code -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="province">Province</label>
                                        <select
                                            name="province"
                                            id="province"
                                            class="form-control"
                                        >
                                            <option value="West Java">West Java</option>
                                            <option value="Central Java">
                                            Central Java
                                            </option>
                                            <option value="East Java">East Java</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="city">City</label>
                                        <select
                                            name="city"
                                            id="city"
                                            class="form-control"
                                        >
                                            <option value="Bandung">Bandung</option>
                                            <option value="Semarang">Semarang</option>
                                            <option value="Surabaya">Surabaya</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="postalCode">Postal Code</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="postalCode"
                                            name="postalCode"
                                            value="78991"
                                        />
                                        </div>
                                    </div>

                                    <!-- 4. Country & Mobile -->
                                    <div class="col md-6">
                                        <div class="form-group">
                                        <label for="country">Country</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="country"
                                            name="country"
                                            value="Indonesia"
                                        />
                                        </div>
                                    </div>
                                    <div class="col md-6">
                                        <div class="form-group">
                                        <label for="number">Number</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="number"
                                            name="number"
                                            value="+6282154590559"
                                        />
                                        </div>
                                    </div>
                                </div>

                                <!-- Button Save -->
                                <div class="row">
                                    <div class="col
                                     text-right">
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