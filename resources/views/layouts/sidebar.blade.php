<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('app.dashboard') }}" class="brand-link">
        <img src="" alt="Cadastro de vendas">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="true">
                <li class="nav-item">
                    <a href="{{ route('app.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('app.users.all') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Usuários</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('app.products.all') }}" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Produtos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('app.sales.all') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Vendas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('app.reports.all') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Relatórios</p>
                    </a>
                </li>

                <li class="nav-item">
                    <hr style="border-bottom: 1px solid #4b545c; margin: 0.5rem 0;">
                </li>

                <li class="nav-item">
                    <a href="{{ route('app.profile.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Meu perfil</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('app.settings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Configurações</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
