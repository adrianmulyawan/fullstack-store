<!-- Navbar -->
<nav
  class="
    navbar navbar-expand-lg navbar-light navbar-store
    fixed-top
    navbar-fixed-top
  "
  data-aos="fade-down"
>
  <div class="container">
    <!-- Nabar Logo -->
    <a href="{{ route('home') }}" class="navbar-brand">
      <img src="/icon/ic_logo.svg" alt="logoAplikasi" />
    </a>

    <!-- Navbar Humberger -->
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarResponsive"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Menu -->
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('categories') }}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rewards</a>
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
              Sign Up
            </a>
          </li>

          <li class="nav-item">
            <a
              class="btn btn-success nav-link px-4 text-white"
              href="{{ route('login') }}"
            >
              Sign In
            </a>
          </li>
        @endguest
      </ul>

      @auth
        <ul class="navbar-nav d-none d-lg-flex">
          <li class="nav-item dropdown">
            <a
              href="#"
              class="nav-link"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
            >
              <img
                src="images/user_pc.png"
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
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          <!-- Icon Chart -->
          <li class="nav-item">
            <a href="#" class="nav-link d-inline-block mt-2">
              <img src="icon/ic_cart.svg" alt="ic_cart_empty" />
            </a>
          </li>
        </ul>

        <!-- Mobile Menu -->
        <ul class="navbar-nav d-block d-lg-none">
          <li class="nav-item">
            <a href="#" class="nav-link">Hi, Mandalika</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link d-inline-block">Cart</a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link d-inline-block">Logout</a>
          </li>
        </ul>
      @endauth
    </div>
  </div>
</nav>