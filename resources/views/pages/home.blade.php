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
        <div class="row">
          <div class="col-md-12" data-aos="fade-up">
            <h5>Trend Categories</h5>
          </div>
        </div>

        <div class="row">
          <div
            class="col-6 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <a class="component-categories d-block" href="#">
              <div class="categories-image">
                <img
                  src="icon/ic_gadget_electronic.svg"
                  alt=""
                  class="w-100"
                />
              </div>
              <p class="categories-text">Gadget</p>
            </a>
          </div>
          <div
            class="col-6 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <a class="component-categories d-block" href="#">
              <div class="categories-image">
                <img src="icon/ic_furniture.svg" alt="" class="w-100" />
              </div>
              <p class="categories-text">Furniture</p>
            </a>
          </div>
          <div
            class="col-6 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <a class="component-categories d-block" href="#">
              <div class="categories-image">
                <img src="icon/ic_makeuo.svg" alt="" class="w-100" />
              </div>
              <p class="categories-text">Make Up</p>
            </a>
          </div>
          <div
            class="col-6 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <a class="component-categories d-block" href="#">
              <div class="categories-image">
                <img src="icon/ic_sneaker.svg" alt="" class="w-100" />
              </div>
              <p class="categories-text">Sneaker</p>
            </a>
          </div>
          <div
            class="col-6 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <a class="component-categories d-block" href="#">
              <div class="categories-image">
                <img src="icon/ic_tools.svg" alt="" class="w-100" />
              </div>
              <p class="categories-text">Tools</p>
            </a>
          </div>
          <div
            class="col-6 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <a class="component-categories d-block" href="#">
              <div class="categories-image">
                <img src="icon/ic_baby.svg" alt="" class="w-100" />
              </div>
              <p class="categories-text">Baby</p>
            </a>
          </div>
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
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <a href="details.html" class="component-products d-block">
              <div class="product-thumbnail">
                <div
                  class="product-image"
                  style="
                    background-image: url('images/newproduk/produk1.jpg');
                  "
                ></div>
              </div>
              <div class="product-text">Apple Watch 4</div>
              <div class="product-price">Rp 4500000,00</div>
            </a>
          </div>

          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <a href="details.html" class="component-products d-block">
              <div class="product-thumbnail">
                <div
                  class="product-image"
                  style="
                    background-image: url('images/newproduk/produk2.jpg');
                  "
                ></div>
              </div>
              <div class="product-text">Orange Bogotta</div>
              <div class="product-price">Rp 1500000,00</div>
            </a>
          </div>

          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <a href="details.html" class="component-products d-block">
              <div class="product-thumbnail">
                <div
                  class="product-image"
                  style="
                    background-image: url('images/newproduk/produk3.jpg');
                  "
                ></div>
              </div>
              <div class="product-text">Sofa Mager</div>
              <div class="product-price">Rp 11500000,00</div>
            </a>
          </div>

          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <a href="details.html" class="component-products d-block">
              <div class="product-thumbnail">
                <div
                  class="product-image"
                  style="
                    background-image: url('images/newproduk/produk4.jpg');
                  "
                ></div>
              </div>
              <div class="product-text">Bubuk Matcha</div>
              <div class="product-price">Rp 150000,00</div>
            </a>
          </div>

          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <a href="details.html" class="component-products d-block">
              <div class="product-thumbnail">
                <div
                  class="product-image"
                  style="
                    background-image: url('images/newproduk/produk5.jpg');
                  "
                ></div>
              </div>
              <div class="product-text">Tatakan Gelas Kayu</div>
              <div class="product-price">Rp 10000,00</div>
            </a>
          </div>

          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <a href="details.html" class="component-products d-block">
              <div class="product-thumbnail">
                <div
                  class="product-image"
                  style="
                    background-image: url('images/newproduk/produk6.jpg');
                  "
                ></div>
              </div>
              <div class="product-text">DJI Mavic Pro</div>
              <div class="product-price">Rp 7500000,00</div>
            </a>
          </div>

          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="700"
          >
            <a href="details.html" class="component-products d-block">
              <div class="product-thumbnail">
                <div
                  class="product-image"
                  style="
                    background-image: url('images/newproduk/produk7.jpg');
                  "
                ></div>
              </div>
              <div class="product-text">Nike Air Jordan</div>
              <div class="product-price">Rp 3500000,00</div>
            </a>
          </div>

          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="800"
          >
            <a href="details.html" class="component-products d-block">
              <div class="product-thumbnail">
                <div
                  class="product-image"
                  style="
                    background-image: url('images/newproduk/produk2.jpg');
                  "
                ></div>
              </div>
              <div class="product-text">Monkey Toys</div>
              <div class="product-price">Rp 150000,00</div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection