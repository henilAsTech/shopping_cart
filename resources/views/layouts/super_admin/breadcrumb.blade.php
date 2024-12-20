<div class="navbar-breadcrumb">
    <h5 class="mb-0">@yield('breadcrumb')</h5>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
        </ul>
    </nav>
</div>