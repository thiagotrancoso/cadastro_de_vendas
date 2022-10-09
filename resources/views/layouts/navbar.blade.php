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
            <a href="#" class="nav-link" data-toggle="dropdown">
                <img src=""
                    alt=""
                    class="profile_image rounded-circle">
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="p-3">
                    Name
                </div>

                <div class="dropdown-divider"></div>

                <button href="#" class="dropdown-item"
                    onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2 text-muted"></i> Sair
                </button>
            </div>
        </li>

        <form method="post" id="logout-form" action="">
            @csrf
        </form>
    </ul>
</nav>
