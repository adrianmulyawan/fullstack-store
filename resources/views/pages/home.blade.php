@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
  <!-- Page Content -->
  <div class="pages-content pages-home">
    <!-- Carousel -->
    <section class="store-carousel">
      <div class="container">
        <div class="row">
          <div class="col-lg-12" data-aos="zoom-in">
            <div
              id="storeCarousel"
              class="carousel-slide"
              data-ride="carousel"
            >
              <ol class="carousel-indicators">
                <li
                  class="active"
                  data-target="#storeCarousel"
                  data-slide-to="0"
                ></li>
                <li data-target="#storeCarousel" data-slide-to="1"></li>
                <li data-target="#storeCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="images/banner.png"
                    alt="carousel1"
                    class="d-block w-100"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="images/banner 2.png"
                    alt="carousel2"
                    class="d-block w-100"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="images/banner 3.png"
                    alt="carousel3"
                    class="d-block w-100"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Trend Categories -->
    <section class="store-trend-categories">
      <div class="container">
        {{-- Header Categories --}}
        <div class="row">
          <div class="col-md-12" data-aos="fade-up">
            <h5>Trend Categories</h5>
          </div>
        </div>

        {{-- Content Categories --}}
        <div class="row">
          @php
            $incrementCategory = 0
          @endphp
          @forelse ($categories as $category)
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory += 100 }}">
              <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                <div class="categories-image">
                  <img
                    src="{{ Storage::url($category->photo) }}"
                    alt=""
                    class="w-100"
                  />
                </div>
                <p class="categories-text">{{ $category->name }}</p>
              </a>
            </div>
          @empty
            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
              <p>Categories Not Empty</p>   
            </div>
          @endforelse
        </div>
      </div>
    </section>

    <!-- New Products -->
    <section class="store-new-products">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5>New Product</h5>
          </div>
        </div>

        <div class="row">
          @php
            $incerementProduct = 0
          @endphp
          @forelse ($products as $product)
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="{{ $incerementProduct += 100 }}"
            >
              <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                <div class="product-thumbnail">
                  <div
                    class="product-image"
                    style="
                      /* Lakukan Pengecekan Ada Tidak Gambarnya */
                      @if($product->galleries)
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                      @else
                        background-color: #eee
                      @endif
                    "
                  ></div>
                </div>
                <div class="product-text">
                  {{ $product->name }}
                </div>
                <div class="product-price">
                  Rp {{ $product->price }},00
                </div>
              </a>
            </div>
          @empty
            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
              <p>Product Not Empty</p>   
            </div>
          @endforelse
        </div>
      </div>
    </section>
  </div>
@endsection