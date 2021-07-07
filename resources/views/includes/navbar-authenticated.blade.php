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
        <a href="index.html" class="navbar-brand">
            <img src="icon/ic_logo.svg" alt="logoAplikasi" />
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
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories.html">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rewards</a>
                </li>
            </ul>

            <!-- Desktop Menu -->
            <!-- d-none: agar di tampilan mobile tidak muncul
                d-lg-flex: di layar gede (Desktop) muncul
            -->
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
                        Hi, Mandalika
                    </a>
                    <div class="dropdown-menu">
                    <a href="dashboard.html" class="dropdown-item">Dashboard</a>
                    <a href="dashboard-account.html" class="dropdown-item"
                        >Settings</a
                    >
                    <div class="dropdown-divider"></div>
                    <a href="/" class="dropdown-item">Logout</a>
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
        </div>
    </div>
</nav>
