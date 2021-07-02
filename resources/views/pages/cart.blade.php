@extends('layouts.app')

@section('title')
  Store Cart
@endsection

@section('content')
    <!-- Page Content -->
  <div class="pages-content page-cart">
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
                <li class="breadcrumb-item active">Cart</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <!-- 2. Cart Product (Image), Shipping Details, Payment Info  -->
    <section class="store-cart">
      <div class="container">
        <!-- Images -->
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-12 table-responsive">
            <table class="table table-borderless table-cart">
              <thead>
                <tr>
                  <td>Image</td>
                  <td>Name &amp; Seller</td>
                  <td>Price</td>
                  <td>Menu</td>
                </tr>
              </thead>
              <tbody>
                {{-- Inisiasi harga awal produk --}}
                @php $totalPrice = 0 @endphp
                @foreach ($carts as $cart)
                  <tr>
                    <td style="width: 25%">
                      @if ($cart->product->galleries)
                        <img
                          src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                          alt=""
                          class="cart-image w-100"
                        />
                      @endif
                    </td>
                    <td style="width: 30%">
                      <div class="product-title">
                        {{ $cart->product->name }}
                      </div>
                      <div class="product-subtitle">
                        by {{ $cart->product->user->store_name }}
                      </div>
                    </td>
                    <td style="width: 30%">
                      <div class="product-title">{{ number_format($cart->product->price) }}</div>
                      <div class="product-subtitle">Rupiah</div>
                    </td>
                    <td style="width: 20%">
                      <form 
                        action="{{ route('cart-delete', $cart->id) }}" method="POST"
                      >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-remove-cart">
                          Remove
                        </button>
                      </form>
                    </td>
                  </tr>
                  {{-- Jumlahkan transaksi --}}
                  @php $totalPrice += $cart->product->price @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <!-- Shipping Details -->
        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-4">Shipping Details</h2>
          </div>
        </div>
        {{-- Buat form untuk memasukan inputan alamat user --}}
        <form action="" id="locations">
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <!-- Address -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_one">Address 1</label>
                <input
                  type="text"
                  class="form-control"
                  id="address_one"
                  name="address_one"
                  value="Setra Duta Cemara"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_two">Address 2</label>
                <input
                  type="text"
                  class="form-control"
                  id="address_two"
                  name="address_two"
                  value="Blok B2 No 4"
                />
              </div>
            </div>

            <!-- Province, Cit, Postal Code -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="provinces_id">Province</label>
                {{-- Atur Select dan option Provinces yang sudah dibuat di vue --}}
                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                  <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                </select>
                <select v-else class="form-control"></select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies_id">City</label>
                {{-- Atur Select dan option Regencies yang sudah dibuat disini --}}
                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                  <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="zip_code">Postal Code</label>
                <input
                  type="text"
                  class="form-control"
                  id="zip_code"
                  name="zip_code"
                  value="78991"
                />
              </div>
            </div>

            <!-- Country & Mobile -->
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
                <label for="phone_number">Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="phone_number"
                  name="phone_number"
                  value="+6282154590559"
                />
              </div>
            </div>
          </div>

          <!-- Payments Informations -->
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-2">Payments Informations</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
              <div class="product-title">Rp 0</div>
              <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title">Rp 0</div>
              <div class="product-subtitle">Product Insurance</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">Rp 0</div>
              <div class="product-subtitle">Ship to Jakarta</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title text-success">
                Rp {{ number_format($totalPrice ?? 0) }}.00
              </div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <a
                href="success.html"
                class="btn btn-success mt-4 px-4 btn-block"
              >
                Checkout Now
              </a>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection

@push('addon-script')
  <!-- Panggil Vue JS -->
  <script src="/vendor/vue/vue.js"></script>
  <script src="https://unpkg.com/vue-toasted"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    let locations = new Vue({
      el: "#locations",
      // mounted: script yang dijalankan jika vue js muncul
      mounted() {
        // Panggil libraray AOS.Init
        AOS.init();
        this.getProvincesData();
      },
      // menyimpan variabel di javascript
      data: {
        provinces: null,
        regencies: null,
        provinces_id: null,
        regencies_id: null
      },
      // method: menyimpan method-method vue js
      methods: {
        // tampilkan datanya disini (ambil data province & regencies)
        getProvincesData() {
          // let self = this; -> agar bisa dibaaca oleh axios
          let self = this;
          axios.get('{{ route('api-provinces') }}')
              .then(function(response){
                self.provinces = response.data;
              })
        },
        getRegenciesData() {
          // let self = this; -> agar bisa dibaaca oleh axios
          let self = this;
          axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function(response){
                self.regencies = response.data;
              })
        },
      },
      // WATCH: jika ada perubahan data maka akan dilakukan sesuatu
      watch: {
        provinces_id: function(val, oldVal) {
          this.regencies_id = null;
          this.getRegenciesData();
        }
      }
    });
  </script>
@endpush