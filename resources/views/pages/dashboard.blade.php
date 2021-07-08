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
                            <div class="dashboard-card-title">
                                Customer
                            </div>
                            {{-- Menghitung Jumlah Customer --}}
                            <div class="dashboard-card-subtitle">
                                {{ number_format($customer) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Revenue -->
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Revenue</div>
                            {{-- Menghitung Jumlah Pendapatan --}}
                            <div class="dashboard-card-subtitle">
                                {{ number_format($revenue) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Transaction -->
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Transaction
                            </div>
                            {{-- Menghitung jumlah transactions --}}
                            <div class="dashboard-card-subtitle">
                                {{ number_format($transaction_count) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transaction -->
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transaction</h5>

                    <!-- Loop Transactions Terakhir -->
                    @forelse ($transaction_data as $transaction)
                        <a
                            href="{{ route('dashboard-transaction-details', $transaction->id) }}"
                            class="card card-list d-block"
                        >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img
                                            src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                            alt="gambar-produk"
                                            class="w-75"
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        {{ $transaction->product->name ?? '' }}
                                    </div>
                                    <div class="col-md-3">
                                        {{ $transaction->transaction->user->name ?? '' }}
                                    </div>
                                    <div class="col-md-3">
                                        {{ $transaction->created_at ?? '' }}
                                    </div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="icon/ic_expand_more.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-center">
                            No transactions have been made yet
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection