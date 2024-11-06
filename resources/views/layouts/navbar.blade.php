<nav class="container-fluid fixed-top border-secondary border p-3 col-11 rounded mt-2 navbar navbar-expand-lg navbar-dark shadow">
    <div class="container-fluid">

        <a class="navbar-brand tpb" href="/">Sky Livings</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="custom_act text-white nav-link custom-active-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
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
                    <a class="nav-link text-white custom-active-link {{ Route::is('hire') ? 'active' : '' }}" href="/hire">Hire Us</a>
                </li>

                @php
                $type = session()->get('type');
                @endphp

                @if($type === 'Customer' || $type === 'Admin')

                @php
                $userModel = $type === 'Customer' ? \App\Models\User::find(session('id')) : \App\Models\AdminUser::find(session('id'));
                $userName = $type === 'Customer' ? $userModel->fullname : 'Admin-' . $userModel->name;
                @endphp

                <li class="nav-item dropdown">
                    <a class="bg-warning text-dark border border-dark rounded nav-link dropdown-toggle" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$userName }}</a>
                    <ul class="text-white dropdown-menu bg-transparent" aria-labelledby="pagesDropdown">
                        @if($type === 'Customer')
                        <li><a class="custom-active-link blur-background text-white dropdown-item {{ Route::is('post') ? 'active' : '' }}" href="{{ route('post') }}">Post</a></li>
                        <li><a class="custom-active-link blur-background text-white dropdown-item {{ Route::is('PurchaseShow') ? 'active' : '' }}" href="{{ URL::to('purchase-show/' .  session('id')) }}">Purchase details</a></li>
                        <li><a class="custom-active-link blur-background text-white dropdown-item {{ Route::is('Yourblog') ? 'active' : '' }}" href="{{ URL::to('your-blog/' . $userModel->id) }}">Your Blogs</a></li>
                        @else
                        <li><a class="custom-active-link blur-background text-white dropdown-item {{ Route::is('adminHome') ? 'active' : '' }}" href="{{ route('adminHome') }}">Admin Page</a></li>
                        @endif
                        <li><a href="/logout" class="custom-active-link blur-background text-white dropdown-item">Logout</a></li>
                    </ul>
                </li>

                @else

                <li class="nav-item justify-content-end">
                    <a class="nav-link text-white" href="/login-user">Login</a>
                </li>

                @endif


            </ul>
        </div>
        @if(session()->has('id'))
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link text-white" href="/cart"><i class="fa-solid fa-cart-plus fs-5"></i></a>
            </li>
        </ul>
        @endif

    </div>
</nav>
