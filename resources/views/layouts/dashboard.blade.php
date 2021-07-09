<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    <!-- Panggil style untuk library A0S -->
    @stack('prepend-style')
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
      <link href="/style/main.css" rel="stylesheet" />
    @stack('addon-style')

  </head>

  <body>
    <!-- Halaman Dashboard -->
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <!-- Sidebar heading (icon aplikasi) -->
          <div class="sidebar-heading text-center">
            <img
              src="/icon/ic_logo_dashboard.svg"
              alt="dahsboardLogo"
              class="my-4"
            />
          </div>
          <!-- Halaman Navigasi Dashboard -->
          <div class="list-group list-group-flush">
            <a
              href="{{ route('dashboard') }}"
              class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}"
            >
              Dashboard
            </a>
            <a
              href="{{ route('dashboard-products') }}"
              class="list-group-item list-group-item-action {{ request()->is('dashboard/products*') ? 'active' : '' }}"
            >
              My Product
            </a>
            <a
              href="{{ route('dashboard-transactions') }}"
              class="list-group-item list-group-item-action {{ request()->is('dashboard/transactions*') ? 'active' : '' }}"
            >
              Transactions
            </a>
            <a
              href="{{ route('dashboard-settings-store') }}"
              class="list-group-item list-group-item-action {{ request()->is('dashboard/settings*') ? 'active' : '' }}"
            >
              Store Settings
            </a>
            <a
              href="{{ route('dashboard-settings-account') }}"
              class="list-group-item list-group-item-action {{ request()->is('dashboard/account*') ? 'active' : '' }}"
            >
              My Account
            </a>
            <button class="list-group-item list-group-item-action" ref="{{ route('logout') }}"
                      onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              Sign Out
            </button>
          </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <!-- Navbar -->
          <nav
            class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
            data-aos="fade-down"
          >
            <div class="container-fluid">
              <!-- Button Menu -->
              <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menu-toggle"
              >
                &laquo; Menu
              </button>
              <!-- Navbar Humberger -->
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
              >
                <span class="navbar-toggler-icon"></span>
              </button>

              <!-- Navbar Menu -->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Desktop Menu -->
                <!-- d-none: agar di tampilan mobile tidak muncul
                d-lg-flex: di layar gede (Desktop) muncul -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                  <li class="nav-item dropdown">
                    <a
                      href="#"
                      class="nav-link"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                    >
                      <img
                        src="/images/user_pc.png"
                        alt="user-pic"
                        class="rounded-circle mr-2 profile-picture"
                      />
                      Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                      <a href="{{ route('dashboard') }}" class="dropdown-item">
                        Dashboard
                      </a>
                      <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item">
                        Settings
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); 
                              document.getElementById('logout-form').submit();">
                        Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </div>
                  </li>
                  <!-- Icon Chart -->
                  <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                      @php
                        $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                      @endphp
                      @if ($carts > 0)
                        <img src="/icon/ic_cart_filled.svg" alt="ic_cart" />
                        <div class="card-badge">{{ $carts }}</div>
                      @else
                        <img src="/icon/ic_cart.svg" alt="ic_cart" />
                      @endif
                    </a>
                  </li>
                </ul>

                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a href="#" class="nav-link">Hi, {{ Auth::user()->name }}</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                      Cart
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link d-inline-block" href="{{ route('logout') }}" 
                          onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          {{-- Buat yield content --}}
          @yield('content')
        </div>
      </div>
    </div>

    {{-- Tambhkan Stack Prepend Script --}}
    @stack('prepend-script')

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <!-- Panggil bundle script js -->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Panggil AOS library script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Tambahkan Script JS untuk muncul/hilangin sidebar -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>

    {{-- Tambahkan Stack Addon Script --}}
    @stack('addon-script')
  </body>
</html>
