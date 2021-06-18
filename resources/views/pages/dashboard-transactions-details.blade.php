@extends('layouts.dashboard')

@section('title', 'Dashboard Transactions Details')

@section('content')
<!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
    <div class="container-fluid">
    <!-- Teks transaction details dan subtitle -->
    <div class="dashboard-heading">
        <h2 class="dashboard-title">#STORE0839</h2>
        <p class="dashboard-subtitle">Transactions Details</p>
    </div>
    <!-- Content Transaction Details -->
    <div class="dashboard-content" id="transactionDetails">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                <!-- Image Product, Customer, Product, etc -->
                <div class="row">
                <!-- Image Product -->
                <div class="col-12 col-md-4">
                    <img
                    src="/images/transcation-details.png"
                    class="w-100 mb-3"
                    />
                </div>
                <!-- Deskrpsi Produk -->
                <div class="col-12 col-md-8">
                    <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="product-title">Customer Name</div>
                        <div class="product-subtitle">
                        Adrian Mulyawan
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">Product Name</div>
                        <div class="product-subtitle">
                        Shirup Marzan
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">
                        Date of Transaction
                        </div>
                        <div class="product-subtitle">
                        12 January, 2020
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">Payment Status</div>
                        <div class="product-subtitle text-danger">
                            Pending
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">Total Amount</div>
                        <div class="product-subtitle">$120,89</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">Mobile</div>
                        <div class="product-subtitle">
                        +6282154590559
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Shipping Informations -->
                <div class="row">
                <div class="col-12 mt-4">
                    <h5>Shipping Informations</h5>
                </div>
                <div class="col-12">
                    <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="product-title">Address 1</div>
                        <div class="product-subtitle">
                        Setra Duta Cemara
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">Address 2</div>
                        <div class="product-subtitle">
                        Blok H Genap Nomor 2
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">Province</div>
                        <div class="product-subtitle">
                        West Kalimantan
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">City</div>
                        <div class="product-subtitle">Pontianak</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">Postal Code</div>
                        <div class="product-subtitle">78991</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="product-title">Country</div>
                        <div class="product-subtitle">Indonesia</div>
                    </div>
                    {{-- Shipping Status dibuat secara manual oleh seller product --}}
                    <div class="col-12 col-md-3">
                        <div class="product-title">Shipping Status</div>
                        <select
                        name="status"
                        id="status"
                        class="form-control"
                        v-model="status"
                        >
                        <option value="PENDING">PENDING</option>
                        <option value="SHIPPING">SHIPPING</option>
                        <option value="SUCCESS">SUCCESS</option>
                        </select>
                    </div>
                    <template v-if="status == 'SHIPPING'">
                        <div class="col-md-3">
                        <div class="product-title">Input Resi</div>
                        <input
                            type="text"
                            class="form-control"
                            name="resi"
                            v-model="resi"
                        />
                        </div>
                        <div class="col-md-2">
                        <button
                            type="submit"
                            class="btn btn-success btn-block mt-4"
                        >
                            Update Resi
                        </button>
                        </div>
                    </template>
                    </div>
                </div>
                </div>
                <!-- Button Save -->
                <div class="row mt-4">
                <div class="col-12 text-right">
                    <button
                    type="submit"
                    class="btn btn-success btn-lg"
                    >
                    Save Now
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
<!-- Panggil Vue JS -->
<script src="/vendor/vue/vue.js"></script>
<script>
    let transactionDetails = new Vue({
    el: "#transactionDetails",
    data: {
        status: "SHIPPING",
        resi: "JNE20839149021029301231",
    },
    });
</script>
@endpush