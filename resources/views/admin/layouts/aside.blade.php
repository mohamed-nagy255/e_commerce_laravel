    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/dashboard" class="brand-link">
            <img src="{{ URL::asset('admin_assets/images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: 0.8" />
            <span class="brand-text font-weight-light">E-Commece</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <br>
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search" />
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item {{ Request()->is('dashboard') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request()->is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}"
                                    class="nav-link {{ Request()->is('dashboard') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Home</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Categories --}}
                    @can('categories')
                        <li class="nav-item {{ Request()->is('dashboard/categories*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request()->is('dashboard/categories*') ? 'active' : '' }}">
                                <i class=" nav-icon fa-solid fa-layer-group"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('categories-list')
                                    <li class="nav-item">
                                        <a href="{{ route('categories.index') }}"
                                            class="nav-link {{ Request()->is('dashboard/categories/categories_list') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Categories List</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    {{-- Users & Custemors Setting --}}
                    @can('users')
                        <li class="nav-item {{ Request()->is('dashboard/users*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request()->is('dashboard/users*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('admins')
                                    <li class="nav-item">
                                        <a href="{{ route('admins.index') }}"
                                            class="nav-link {{ Request()->is('dashboard/users/admins') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Admins</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('custemors')
                                    <li class="nav-item">
                                        <a href="{{ route('custemors.index') }}"
                                            class="nav-link {{ Request()->is('dashboard/users/custemors*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Custemors</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('roles')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}"
                                            class="nav-link {{ Request()->is('dashboard/users/roles*') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
