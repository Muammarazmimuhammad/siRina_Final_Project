<style>
    /* === Custom Sidebar Theme: Blue Professional === */

    /* Base Sidebar Style with Gradient */
    .sidebar-modern-blue {
        background: linear-gradient(180deg, rgb(28, 58, 138) 0%, rgb(23, 37, 84) 100%);
        border-right: none;
    }

    /* Brand Logo Area */
    .sidebar-modern-blue .brand-link {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem; /* Jarak antara logo dan teks */
    }
    .sidebar-modern-blue .brand-logo {
        width: 32px;
        height: 32px;
    }
    .sidebar-modern-blue .brand-text {
        color: #ffffff;
        font-weight: 600 !important;
        font-size: 1.15rem;
    }

    /* Navigation Links */
    .sidebar-modern-blue .nav-sidebar .nav-item {
        margin: 0.25rem 0.75rem; /* Memberi padding horizontal pada container item */
    }
    .sidebar-modern-blue .nav-sidebar .nav-link {
        color: #dbeafe; /* Blue-200 */
        font-weight: 500;
        transition: all 0.2s ease-in-out;
        border-radius: 0.5rem; /* Sudut yang lebih membulat */
        padding: 0.7rem 1rem;
    }
    .sidebar-modern-blue .nav-sidebar .nav-link .nav-icon {
        color: #93c5fd; /* Blue-300 */
        margin-right: 0.75rem !important;
        transition: all 0.2s ease-in-out;
        width: 1.5rem;
        text-align: center;
    }

    /* Hover State */
    .sidebar-modern-blue .nav-sidebar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #ffffff;
    }
    .sidebar-modern-blue .nav-sidebar .nav-link:hover .nav-icon {
        color: #ffffff;
        transform: scale(1.1); /* Efek ikon membesar saat hover */
    }

    /* Active State */
    .sidebar-modern-blue .nav-sidebar .nav-link.active {
        background-color: #2563eb; /* Blue-600 */
        color: #ffffff;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.5);
    }
    .sidebar-modern-blue .nav-sidebar .nav-link.active .nav-icon {
        color: #ffffff;
    }

    /* Remove default padding from nav-pills */
    .sidebar-modern-blue .nav-pills {
        padding: 0;
    }
</style>

<aside class="main-sidebar sidebar-modern-blue elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <svg class="brand-logo" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="rgba(255,255,255,0.8)"/>
            <path d="M2 17L12 22L22 17L12 12L2 17Z" fill="rgba(255,255,255,0.4)"/>
            <path d="M2 7L12 12V22L2 17V7Z" fill="rgba(255,255,255,0.6)"/>
            <path d="M22 7L12 12V22L22 17V7Z" fill="rgba(255,255,255,1)"/>
        </svg>
        <span class="brand-text">SiRina</span>
    </a>

    <div class="sidebar">
        <nav class="mt-4"> <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

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
                    <a href="{{ route('admin.inventaris.index') }}" class="nav-link @if(Route::is('admin.inventaris.*')) active @endif">
                        <i class="nav-icon fas fa-boxes-stacked"></i> <p>Data Inventaris</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.peminjaman.index') }}" class="nav-link @if(Route::is('admin.peminjaman.*')) active @endif">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Peminjaman Ruangan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.peminjaman_inventaris.index') }}" class="nav-link @if(Route::is('admin.peminjaman_inventaris.*')) active @endif">
                        <i class="nav-icon fas fa-dolly"></i> <p>Peminjaman Inventaris</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>