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
        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
          <!-- Address -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="addressOne">Address 1</label>
              <input
                type="text"
                class="form-control"
                id="addressOne"
                name="addressOne"
                value="Setra Duta Cemara"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="addressTwo">Address 2</label>
              <input
                type="text"
                class="form-control"
                id="addressTwo"
                name="addressTwo"
                value="Blok B2 No 4"
              />
            </div>
          </div>

          <!-- Province, Cit, Postal Code -->
          <div class="col-md-4">
            <div class="form-group">
              <label for="province">Province</label>
              <select name="province" id="province" class="form-control">
                <option value="West Java">West Java</option>
                <option value="Central Java">Central Java</option>
                <option value="East Java">East Java</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control">
                <option value="Bandung">Bandung</option>
                <option value="Semarang">Semarang</option>
                <option value="Surabaya">Surabaya</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="postalCode">Postal Code</label>
              <input
                type="text"
                class="form-control"
                id="postalCode"
                name="postalCode"
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
              <label for="number">Number</label>
              <input
                type="text"
                class="form-control"
                id="number"
                name="number"
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
            <div class="product-title">$10</div>
            <div class="product-subtitle">Country Tax</div>
          </div>
          <div class="col-4 col-md-3">
            <div class="product-title">$280</div>
            <div class="product-subtitle">Product Insurance</div>
          </div>
          <div class="col-4 col-md-2">
            <div class="product-title">$580</div>
            <div class="product-subtitle">Ship to Jakarta</div>
          </div>
          <div class="col-4 col-md-2">
            <div class="product-title text-success">$392,409</div>
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
      </div>
    </section>
  </div>
@endsection