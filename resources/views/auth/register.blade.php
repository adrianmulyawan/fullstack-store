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
                    <form class="mt-3">
                        <div class="form-group">
                            <label for="fullName">Fullname</label>
                            <!-- v-model: jika kita punya inputan dan kita ingin taruh pada suatu data tetapi tidak ingin merubahnya -->
                            <input
                                type="text"
                                class="form-control is-valid"
                                v-model="name"
                                id="fullName"
                                autofocus
                            />
                        </div>
                        <div class="form-group">
                            <label for="emailAddress"
                                >Email Address</label
                            >
                            <input
                                type="email"
                                class="form-control is-invalid"
                                v-model="email"
                                id="emailAddress"
                            />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                            />
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
                            <input type="text" class="form-control" />
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="kategori">Kategori</label>
                            <select
                                name="category"
                                class="form-control"
                            >
                                <option value="" disabled>
                                    Select Category
                                </option>
                            </select>
                        </div>
                        <a
                            href="dashboard.html"
                            class="btn btn-success btn-block mt-4"
                        >
                            Sign Up Now
                        </a>
                        <a
                            href="login.html"
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

<div class="containerh" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
    <!-- Panggil Vue -->
    <script src="/vendor/vue/vue.js"></script>
    <!-- Panggil Library Vue Toasted -->
    <script src="https://unpkg.com//vue-toasted"></script>
    <script>
        // Panggil Vue Toasted
        Vue.use(Toasted);

        // buat instance vue js
        let register = new Vue({
            el: "#register",
            mounted() {
                // panggil AOS library
                AOS.init();
                // panggil Vue Toasted
                this.$toasted.error(
                    "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                    {
                        position: "top-center",
                        className: "rounded",
                        duration: 1000,
                    }
                );
            },
            data: {
                name: "Adrian Mulyawan",
                email: "adrianmulyawan666@gmail.com",
                password: "",
                is_store_open: true,
                store_name: "",
            },
        });
    </script>
@endpush