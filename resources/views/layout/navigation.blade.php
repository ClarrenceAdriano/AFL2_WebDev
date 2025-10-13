<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Owence's</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('Products') ? 'active' : '' }}" href="/Products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('AboutUs') ? 'active' : '' }}" href="/AboutUs">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('Contact') ? 'active' : '' }}" href="/Contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>