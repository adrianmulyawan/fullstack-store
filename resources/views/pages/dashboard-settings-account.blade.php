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
            {{-- Laravel Flash Message --}}
            <p data-aos="fade-up" class="dashboard-title">
                @include('includes.flash-message')
            </p>
        </div>
        <!-- Store My Account Content -->
        <div class="dashboard-content">
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account')}}" method="POST" enctype="multipart/form-data" id="locations">
                        @csrf
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
                                            value="{{ $user->name }}"
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
                                            value="{{ $user->email }}"
                                        />
                                        </div>
                                    </div>

                                    <!-- 2. Address -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="address_one">Address 1</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="address_one"
                                            name="address_one"
                                            value="{{ $user->address_one }}"
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
                                            value="{{ $user->address_two }}"
                                        />
                                        </div>
                                    </div>

                                    <!-- 3. Province, City, Postal Code -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="provinces_id">Province</label>
                                            {{-- Atur Select dan option Provinces yang sudah dibuat di vue --}}
                                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                                                <option v-for="province in provinces" :value="province.id">
                                                    @{{ province.name }}
                                                </option>
                                            </select>
                                            <select v-else class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="regencies_id">City</label>
                                            {{-- Atur Select dan option Regencies yang sudah dibuat disini --}}
                                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                                <option v-for="regency in regencies" :value="regency.id">
                                                    @{{ regency.name }}
                                                </option>
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
                                                value="{{ $user->zip_code }}"
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
                                            value="{{ $user->country }}"
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
                                            value="{{ $user->phone_number }}"
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