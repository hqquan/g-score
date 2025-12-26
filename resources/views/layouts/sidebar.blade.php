<!-- Sidebar -->
<a href="/" class="text-white text-decoration-none">
    <span class="fs-4">G-Scores</span>
</a>
<hr>
<ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a href="/" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            aria-current="page">
            Dashboard
        </a>
    </li>
    <li>
        <a href="{{ route('search.index') }}"
            class="nav-link text-white {{ request()->routeIs('search*') ? 'active' : '' }}">
            Search scores
        </a>
    </li>
    <li>
        <a href="{{ route('report.index') }}"
            class="nav-link text-white {{ request()->routeIs('report*') ? 'active' : '' }}">
            Reports
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white">
            Settings
        </a>
    </li>
</ul>