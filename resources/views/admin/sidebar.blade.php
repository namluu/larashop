@inject('menu', \App\Helpers\Menu::class)
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {{$menu::menuOpen('categories')}}">
                    <a href="#" class="nav-link {{$menu::menuActiveLv1('categories')}}">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>Categories<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{$menu::menuActiveLv2('categories.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link {{$menu::menuActiveLv2('categories.create')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{$menu::menuOpen('products')}}">
                    <a href="#" class="nav-link {{$menu::menuActiveLv1('products')}}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Products<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link {{$menu::menuActiveLv2('products.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.create') }}" class="nav-link {{$menu::menuActiveLv2('products.create')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create product</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{$menu::menuOpen('sliders')}}">
                    <a href="#" class="nav-link {{$menu::menuActiveLv1('sliders')}}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Sliders<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sliders.index') }}" class="nav-link {{$menu::menuActiveLv2('sliders.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sliders.create') }}" class="nav-link {{$menu::menuActiveLv2('sliders.create')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create slider</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
