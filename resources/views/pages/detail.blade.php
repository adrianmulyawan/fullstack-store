@extends('layouts.app')

@section('title')
  Store Detail Product
@endsection

@section('content')
  <div class="pages-content page-details">
    <!-- 1. Bread Crumb -->
    <section
      class="store-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index">Home</a>
                </li>
                <li class="breadcrumb-item active">Product Details</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <!-- 2. Image Gallery -->
    <section class="store-gallery" id="gallery">
      <div class="container">
        <div class="row">
          <!-- Image Ditampilkan -->
          <div class="col-lg-8" data-aos="zoom-in">
            <!-- buat tag transition (bawaan vue.js) -->
            <transition name="slide-fade" mode="out-in">
              <!-- Kita binding (v-bind) object image dan kita ambil object array ([activePhoto: 0])/paling pertama -->
              <!-- Setelah itu kita ambil key ([v-key]) berdasarkan id photonya/dari database kita ambil dari urlnya -->
              <img
                v-bind:src="photos[activePhoto].url"
                :key="photos[activePhoto].id"
                alt="bannerPhoto"
                class="w-100 main-image"
              />
            </transition>
          </div>
          <!-- List Image -->
          <div class="col-lg-2">
            <div class="row">
              <!-- Kita lakukan looping (v-for) dengan 2 parameter (photo dan index) didalam object photos -->
              <div
                class="col-3 col-lg-12 mt-2 mt-lg-0"
                v-for="(photo, index) in photos"
                :key="photo.id"
                data-aos="zoom-in"
                data-aos-delay="100"
              >
                <a href="#" v-on:click="changeActive(index)">
                  <img
                    v-bind:src="photo.url"
                    alt="listPhoto"
                    class="w-100 thumbnail-image"
                    v-bind:class="{ active: index == activePhoto }"
                  />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 3. Detail Produk -->
    <div class="store-details-container" data-aos="fade-up">
      <!-- Bagian Heading -->
      <section class="store-heading">
        <div class="container">
          <!-- Nama Produk, Penjual, Harga, Button -->
          <div class="row">
            <div class="col-lg-8">
              <h1>Sofa Ternyaman</h1>
              <div class="owner">By Adrian Mulyawan</div>
              <div class="price">$1,409</div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
              <a
                href="cart.html"
                class="btn btn-success px-4 text-white btn-block mb-3"
              >
                Add to Cart
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Bagian Description -->
      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>
                The Nike Air Max 720 SE goes bigger than ever before with
                Nike's tallest Air unit yet for unimaginable, all-day comfort.
                There's super breathable fabrics on the upper, while colours
                add a modern edge.
              </p>
              <p>
                Bring the past into the future with the Nike Air Max 2090, a
                bold look inspired by the DNA of the iconic Air Max 90.
                Brand-new Nike Air cushioning underfoot adds unparalleled
                comfort while transparent mesh and vibrantly coloured details
                on the upper are blended with timeless OG features for an
                edgy, modernised look.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Bagian Review Customer -->
      <section class="store-review">
        <div class="container">
          <!-- Text Customer Review -->
          <div class="row">
            <col-12 class="col-lg-8 mt-3 mb-3">
              <h5>Customer Review (5)</h5>
            </col-12>
          </div>
          <!-- Photo dan comment customer -->
          <div class="row">
            <div class="col-12 col-lg-8">
              <!-- buat list comment / review customer -->
              <ul class="list-unstyled">
                <li class="media">
                  <img
                    src="/images/customer-review/review-1.png"
                    class="rounded-circle"
                    alt="review-1"
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Hazza Rizky</h5>
                    <p>
                      I thought it was not good for living room. I really
                      happy to decided buy this product last week now feels
                      like homey.
                    </p>
                  </div>
                </li>
                <li class="media">
                  <img
                    src="/images/customer-review/review-2.png"
                    class="rounded-circle"
                    alt="review-1"
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Adrian Mulyawan</h5>
                    <p>
                      Color is great with the minimalist concept. Even I
                      thought it was made by Cactus industry. I do really
                      satisfied with this.
                    </p>
                  </div>
                </li>
                <li class="media">
                  <img
                    src="/images/customer-review/review-3.png"
                    class="rounded-circle"
                    alt="review-1"
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Mandalika Ayusti</h5>
                    <p>
                      When I saw at first, it was really awesome to have with.
                      Just let me know if there is another upcoming product
                      like this.
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection

@push('addon-script')
  <!-- Panggil Vue JS -->
  <script src="/vendor/vue/vue.js"></script>
  <script>
    let gallery = new Vue({
      el: "#gallery",
      // mounted: script yang dijalankan jika vue js muncul
      mounted() {
        // panggil/inisialisasi AOS.init() disini
        AOS.init();
      },
      // menyimpan variabel di javascript
      data: {
        activePhoto: 0,
        photos: [
          {
            id: 1,
            url: "/images/detail-produk/pict-gede.png",
          },
          {
            id: 2,
            url: "/images/detail-produk/pict-1.png",
          },
          {
            id: 3,
            url: "/images/detail-produk/pict-2.png",
          },
          {
            id: 4,
            url: "/images/detail-produk/pict-3.png",
          },
        ],
      },
      // method: menyimpan method-method vue js
      methods: {
        changeActive(id) {
          this.activePhoto = id;
        },
      },
    });
  </script>
@endpush