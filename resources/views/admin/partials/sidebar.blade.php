<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-teal elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">echo365</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    

    <!-- Sidebar Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{ route('admin.home') }}" class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.about') }}" class="nav-link {{ request()->routeIs('admin.about') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              About
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.author.home') }}" class="nav-link {{ request()->routeIs('admin.author.*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-rectangle-ad"></i>
            <p>
              Author
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->routeIs('admin.ad.*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-rectangle-ad"></i>
            <p>
              Advertisement
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.ad.home') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-list-ul"></i>
                <p>Home Advertisement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.ad.top') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-list-ul"></i>
                <p>Top Advertisement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.ad.sidebar') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-list-ul"></i>
                <p>Sidebar Advertisement</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-rectangle-ad"></i>
            <p>
              News Categories
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.category.home') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-list-ul"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.subcategory.home') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-list-ul"></i>
                <p>Sub Category</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-header">MISCELLANEOUS</li>
        <li class="nav-item">
          <a href="https://adminlte.io/docs/3.1/" target="_blank" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Documentation</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>