<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home.index') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">ConnectFriend</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto p-lg-0">
            <a href="{{ route('home.index') }}"
                class="nav-item nav-link {{ Route::is('home.index') ? 'active' : '' }}">Home</a>
            <a href="{{ route('home.topup') }}" class="nav-item nav-link {{ Route::is('home.topup') ? 'active' : '' }}">Top up</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Friends</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="job-list.html" class="dropdown-item">Random</a>
                    <a href="job-detail.html" class="dropdown-item">Filter</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Avatar</a>
            {{-- <div class="container-fluid bg-primary mb-5 wow fadeIn" style="padding: 35px;">
                
            </div> --}}
            <div class="row g-2">
                <div class="col-md-8">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control border-0" placeholder="Search....." />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-dark border-0 w-100">Search</button>
                </div>
            </div>
        </div>
        @if (Auth::check())
            <a href="{{ route('home.profile') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">
                Profile
                <i class="fa fa-arrow-right ms-3">
                    <span class="badge text-bg-secondary bg-danger">{{ Auth::user()->friendRequests()->where('status', 'pending')->count() }}</span>
                </i>
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">
                Login
                <i class="fa fa-arrow-right ms-3"></i>
            </a>
        @endif
    </div>
</nav>