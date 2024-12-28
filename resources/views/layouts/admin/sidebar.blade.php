<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <img src="{{ asset('assets/admin/img/logo.png') }}" alt="logo" style="max-height: 100px; height: auto; max-width: 100%; margin-right: 8px;">
        </div>
        <div class="sidebar-brand sidebar-brand-sm"><a href="#">Admin</a></div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('admin.dashboard') }}"><a class="nav-link" style="color: #E82561;" href="{{ Route('admin.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <!-- Menu Event -->
            <li class="{{ Route::is('admin.event.index') }}">
            <a class="nav-link" style="color: #E82561;" href="{{ Route('admin.event.index') }}"><i class="fas fa-globe"></i> 
            <span>Event</span></a></li>
            <!-- Menu Peserta -->
            <li class="{{ Route::is('admin.peserta.index') }}">
            <a class="nav-link" style="color: #E82561;" href="{{ Route('admin.peserta.index') }}"><i class="far fa-address-card"></i> 
            <span>Peserta</span></a></li>
        </ul>
    </aside>
</div>