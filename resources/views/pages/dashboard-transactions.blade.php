@extends('layouts.dashboard')

@section('title', 'Dashboard Transactions')

@section('content')
<!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
    <div class="container-fluid">
        <!-- Teks transaction dan subtitle -->
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Transcation</h2>
        <p class="dashboard-subtitle">
            Big result start from the small one
        </p>
        </div>
        <div class="dashboard-content">
        <!-- Transaction -->
        <div class="row">
            <div class="col-12 mt-2">
            <!-- Tab pills (Sell Product/Buy Product) -->
            <ul
                class="nav nav-pills mb-3"
                id="pills-tab"
                role="tablist"
            >
                <li class="nav-item" role="presentation">
                <a
                    class="nav-link active"
                    id="pills-home-tab"
                    data-toggle="pill"
                    href="#pills-home"
                    role="tab"
                    aria-controls="pills-home"
                    aria-selected="true"
                    >Sell Product</a
                >
                </li>
                <li class="nav-item" role="presentation">
                <a
                    class="nav-link"
                    id="pills-profile-tab"
                    data-toggle="pill"
                    href="#pills-profile"
                    role="tab"
                    aria-controls="pills-profile"
                    aria-selected="false"
                    >Buy Product</a
                >
                </li>
            </ul>
            <!-- Isi Product -->
            <div class="tab-content" id="pills-tabContent">
                <div
                class="tab-pane fade show active"
                id="pills-home"
                role="tabpanel"
                aria-labelledby="pills-home-tab"
                >
                <!-- Recent Transcation Product 1 -->
                <a
                    href="dashboard-transactions-details.html"
                    class="card card-list d-block"
                >
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img
                            src="/images/recent-transaction/item-1.png"
                            alt=""
                        />
                        </div>
                        <div class="col-md-4">Shirup Marzzan</div>
                        <div class="col-md-3">Adrian Mulyawan</div>
                        <div class="col-md-3">12 Januari, 2020</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="/icon/ic_expand_more.svg" alt="" />
                        </div>
                    </div>
                    </div>
                </a>

                <!-- Recent Transaction Product 2 -->
                <a
                    href="dashboard-transactions-details.html"
                    class="card card-list d-block"
                >
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img
                            src="/images/recent-transaction/item-2.png"
                            alt=""
                        />
                        </div>
                        <div class="col-md-4">LeBrone X</div>
                        <div class="col-md-3">Isser Whitey James</div>
                        <div class="col-md-3">03 April, 2020</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="/icon/ic_expand_more.svg" alt="" />
                        </div>
                    </div>
                    </div>
                </a>

                <!-- Recent Transaction Product 3 -->
                <a
                    href="dashboard-transactions-details.html"
                    class="card card-list d-block"
                >
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img
                            src="/images/recent-transaction/item-3.png"
                            alt=""
                        />
                        </div>
                        <div class="col-md-4">Soffa Lembutte X</div>
                        <div class="col-md-3">Nerita</div>
                        <div class="col-md-3">05 April, 2020</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="/icon/ic_expand_more.svg" alt="" />
                        </div>
                    </div>
                    </div>
                </a>
                </div>
                <div
                class="tab-pane fade"
                id="pills-profile"
                role="tabpanel"
                aria-labelledby="pills-profile-tab"
                >
                <!-- Recent Transcation Product 1 -->
                <a
                    href="dashboard-transactions-details.html"
                    class="card card-list d-block"
                >
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img
                            src="/images/recent-transaction/item-1.png"
                            alt=""
                        />
                        </div>
                        <div class="col-md-4">Shirup Marzzan</div>
                        <div class="col-md-3">Adrian Mulyawan</div>
                        <div class="col-md-3">12 Januari, 2020</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="/icon/ic_expand_more.svg" alt="" />
                        </div>
                    </div>
                    </div>
                </a>
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
@endpush