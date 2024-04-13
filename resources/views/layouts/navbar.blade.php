<nav class="container-fluid fixed-top border-secondary border p-3 col-11 rounded mt-2 navbar navbar-expand-lg navbar-dark shadow">
    <div class="container-fluid">

        <a class="navbar-brand tpb" href="/">Topkapi Builders</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="custom_act text-white nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Explore</a>
                    <ul class="text-white dropdown-menu bg-transparent" aria-labelledby="pagesDropdown">
                        <li><a class="custom-active-link blur-background text-white dropdown-item {{ Route::is('buy') ? 'active' : '' }}" href="{{ route('buy') }}">Buy Properties</a></li>
                        <li><a class="custom-active-link blur-background text-white dropdown-item {{ Route::is('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blogs</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/#about_us">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/hire">Hire Us</a>
                </li>
                @if(session()->has('id'))
                <li class="nav-item justify-content-end">
                    <a class="nav-link text-white" href="/post">Post</a>
                </li>
                <li class="nav-item justify-content-end">
                    <a class="nav-link text-white" href="/logout">Logout</a>
                </li>
                @else
                <li class="nav-item justify-content-end">
                    <a class="nav-link text-white" href="/login-user">Login</a>
                </li>
                @endif

            </ul>
        </div>
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link text-white" href="/cart"><i class="fa-solid fa-cart-plus fs-5"></i></a>
            </li>
        </ul>

    </div>
</nav>