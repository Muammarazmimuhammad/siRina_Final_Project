<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-light">SiRina Admin</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link @if(Route::is('admin.dashboard')) active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.ruangan.index') }}" class="nav-link @if(Route::is('admin.ruangan.*')) active @endif">
            <i class="nav-icon fas fa-door-open"></i>
            <p>Data Ruangan</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ route('admin.peminjaman.index') }}" class="nav-link @if(Route::is('admin.peminjaman.*')) active @endif">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>Peminjaman Ruangan</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.inventaris.index') }}" class="nav-link @if(Route::is('admin.inventaris.*')) active @endif">
            <i class="nav-icon fas fa-box"></i>
            <p>Data Inventaris</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ route('admin.peminjaman_inventaris.index') }}"
            class="nav-link @if(Route::is('admin.peminjaman_inventaris.*')) active @endif"> <i class="nav-icon fas fa-box"></i>
            <p>Peminjaman Inventaris</p>
          </a>

        </li>




      </ul>
    </nav>
  </div>
</aside>