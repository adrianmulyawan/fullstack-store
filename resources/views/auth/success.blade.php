@extends('layouts.success')

@section('title')
  Store Success
@endsection

@section('content')
   <!-- Page Content -->
    <div class="pages-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/icon/ic_success.svg" alt="success" class="mb-4" />
              <h2>Welocme to Store</h2>
              <p>
                Kamu sudah berhasil terdaftar bersama kami. <br />
                Let’s grow up now.
              </p>
              <div>
                <a href="dashboard.html" class="btn btn-success w-50 mt-4">
                  My Dashboard
                </a>
                <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-2">
                  Go to Shopping
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection