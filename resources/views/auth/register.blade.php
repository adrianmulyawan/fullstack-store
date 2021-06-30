@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<!-- Content -->
<div class="pages-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div
                class="
                    row
                    align-items-center
                    justify-content-center
                    row-login
                "
            >
                <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli <br />
                        dengan cara terbaru
                    </h2>
                    <form class="mt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="fullName">Fullname</label>
                            <!-- v-model: jika kita punya inputan dan kita ingin taruh pada suatu data tetapi tidak ingin merubahnya -->
                            <input 
                                id="fullName" 
                                v-model="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" name="name" 
                                value="{{ old('name') }}" 
                                required autocomplete="name" autofocus
                            />

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">
                                Email Address
                            </label>
                            <input 
                                id="emailAddress" 
                                v-model="email"
                                @change="checkForEmailAvailability()"
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                :class="{ 'is-invalid' : this.email_unavailable }"
                                name="email" 
                                value="{{ old('email') }}" required autocomplete="email"
                            />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="new-password"
                            />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirm">
                                Confirm Password
                            </label>
                            <input 
                                id="password-confirm" 
                                type="password" 
                                class="form-control @error('password_confirmation') is-invalid @enderror" 
                                name="password_confirmation" required autocomplete="new-password"
                            />

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Store</label>
                            <p class="text-muted">
                                Apakah anda juga ingin membuka toko?
                            </p>
                            <div
                                class="
                                    custom-control
                                    custom-radio
                                    custom-control-inline
                                "
                            >
                                <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="is_store_open"
                                    id="openStoreTrue"
                                    v-model="is_store_open"
                                    v-bind:value="true"
                                />
                                <label
                                    class="custom-control-label"
                                    for="openStoreTrue"
                                >
                                    Iya, Boleh
                                </label>
                            </div>
                            <div
                                class="
                                    custom-control
                                    custom-radio
                                    custom-control-inline
                                "
                            >
                                <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="is_store_open"
                                    id="openStoreFalse"
                                    v-model="is_store_open"
                                    :value="false"
                                />
                                <label
                                    class="custom-control-label"
                                    for="openStoreFalse"
                                >
                                    Tidak, Terimakasih
                                </label>
                            </div>
                        </div>

                        <div class="form-group" v-if="is_store_open">
                            <label for="namaToko">Nama Toko</label>
                            <input 
                                type="text" 
                                v-model="store_name"
                                id="store_name"
                                class="form-control @error('store_name') is-invalid @enderror" 
                                name="store_name" autocomplete autofocus
                                required 
                            />

                            @error('store_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" v-if="is_store_open">
                            <label for="kategori">Kategori</label>
                            <select
                                name="categories_id"
                                class="form-control"
                            >
                                <option value="" disabled>
                                    Select Category
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-success btn-block mt-4"
                            :disabled="this.email_unavailable"
                        >
                            Sign Up Now
                        </button>

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-signup btn-block mt-2"
                        >
                            Back to Sign In
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <!-- Panggil Vue -->
    <script src="/vendor/vue/vue.js"></script>
    <!-- Panggil Library Vue Toasted -->
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        // Panggil Vue Toasted
        Vue.use(Toasted);

        // buat instance vue js
        let register = new Vue({
            el: "#register",
            mounted() {
                // panggil AOS library
                AOS.init();
            },
            methods: {
                checkForEmailAvailability: function() {
                    let self = this;
                    axios.get('{{ route('api-register-check') }}', {
                        params: {
                            email: this.email
                        }
                    })
                        .then(function (response) {

                            if (response.data == 'Available') {
                                // panggil Vue Toasted
                                self.$toasted.show(
                                    "Email anda tersedia! Silahkan lanjutkan kelangkah selanjutnya",
                                    {
                                        position: "top-center",
                                        className: "rounded",
                                        duration: 1000,
                                    }
                                );
                                self.email_unavailable = false;
                            } else { 
                                // panggil Vue Toasted
                                self.$toasted.error(
                                    "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                                    {
                                        position: "top-center",
                                        className: "rounded",
                                        duration: 1000,
                                    }
                                );
                                self.email_unavailable = true;
                            }

                            // handle success
                            console.log(response);
                        });
                }
            },
            data() {
                return {
                    name: 'Adrian Mulyawan',
                    email: 'adrianmulyawan666@gmail.com',
                    is_store_open: true,
                    store_name: "",
                    email_unavailable: false
                }
            },
        });
    </script>
@endpush