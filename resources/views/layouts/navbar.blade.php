<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" style="display: flex; gap: 6px;">
                <span>{{ auth()->user()->name }}</span>
                <i class="fas fa-user-circle" style="font-size: 1.8rem;"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="p-3">
                    {{ auth()->user()->name }}
                </div>

                <div class="dropdown-divider"></div>

                <button href="#" class="dropdown-item"
                    onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2 text-muted"></i> Sair
                </button>
            </div>
        </li>

        <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
            @csrf
        </form>
    </ul>
</nav>
