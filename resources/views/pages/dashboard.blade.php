@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <!-- Teks dashboard dan subtitle -->
        <div class="dashboard-heading">
            <h2 class="dashboard-title">
                Dashboard
            </h2>
            <p class="dashboard-subtitle">
                Look what you have made today!
            </p>
        </div>
        <div class="dashboard-content">
            <!-- Card: Customer, Revenue, Transaction -->
            <div class="row">
                <!-- Card Customer -->
                <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                    <div class="dashboard-card-title">Customer</div>
                    <div class="dashboard-card-subtitle">15,209</div>
                    </div>
                </div>
                </div>

                <!-- Card Revenue -->
                <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                    <div class="dashboard-card-title">Revenue</div>
                    <div class="dashboard-card-subtitle">$931,290</div>
                    </div>
                </div>
                </div>

                <!-- Card Transaction -->
                <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                    <div class="dashboard-card-title">Transaction</div>
                    <div class="dashboard-card-subtitle">22,409,399</div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Recent Transaction -->
            <div class="row mt-3">
                <div class="col-12 mt-2">
                <h5 class="mb-3">Recent Transaction</h5>

                <!-- Recent Transcation Product 1 -->
                <a
                    href="dashboard-transactions-details.html"
                    class="card card-list d-block"
                >
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                        <img
                            src="images/recent-transaction/item-1.png"
                            alt=""
                        />
                        </div>
                        <div class="col-md-4">Shirup Marzzan</div>
                        <div class="col-md-3">Adrian Mulyawan</div>
                        <div class="col-md-3">12 Januari, 2020</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="icon/ic_expand_more.svg" alt="" />
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
                            src="images/recent-transaction/item-2.png"
                            alt=""
                        />
                        </div>
                        <div class="col-md-4">LeBrone X</div>
                        <div class="col-md-3">Isser Whitey James</div>
                        <div class="col-md-3">03 April, 2020</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="icon/ic_expand_more.svg" alt="" />
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
                            src="images/recent-transaction/item-3.png"
                            alt=""
                        />
                        </div>
                        <div class="col-md-4">Soffa Lembutte X</div>
                        <div class="col-md-3">Nerita</div>
                        <div class="col-md-3">05 April, 2020</div>
                        <div class="col-md-1 d-none d-md-block">
                        <img src="icon/ic_expand_more.svg" alt="" />
                        </div>
                    </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection