<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
        <i class="fa-solid fa-hospital-user"></i>
    </div>
    <div class="sidebar-brand-text mx-3">
        PPDK
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-chart-simple"></i>
        <span>Statistik</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Permohonan
</div>

<li class="nav-item {{ Request::is('dashboard/permohonan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('permohonan') }}">
        <i class="fas fa-fw fa-check-to-slot"></i>
        <span>Permohonan</span>
    </a>
</li>

@php
$data = [
'dashboard/permohonan/tertunda',
'dashboard/permohonan/diterima',
'dashboard/permohonan/ditolak',
];
$active = (in_array(Request::path(), $data)) ? true : false;
$detail = Request::is('dashboard/permohonan/data/*') ? 'active' : '';
@endphp
<li class="nav-item {{ $active ? 'active' : $detail }}">
    <a class="nav-link {{ $active ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
        data-target="#collapsePermohonan" aria-expanded="{{ $active ? 'true' : 'false' }}"
        aria-controls="collapsePermohonan">
        <i class="fas fa-fw fa-envelopes-bulk"></i>
        <span>Data Permohonan</span>
    </a>
    <div id="collapsePermohonan" class="collapse {{ $active ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('dashboard/permohonan/tertunda') ? 'active' : '' }}"
                href="{{ route('permohonan-tertunda') }}">Permohonan
                Tertunda</a>
            <a class="collapse-item {{ Request::is('dashboard/permohonan/diterima') ? 'active' : '' }}"
                href="{{ route('permohonan-diterima') }}">Permohonan Diterima</a>
            <a class="collapse-item {{ Request::is('dashboard/permohonan/ditolak') ? 'active' : '' }}"
                href="{{ route('permohonan-ditolak') }}">Permohonan Ditolak</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

{{-- only role admin --}}
@if (Auth::user()->role == 'admin')

<!-- Heading -->
<div class="sidebar-heading">
    Admin Panel
</div>


<li class="nav-item {{ Request::is('dashboard/user*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('user.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Manage User</span>
    </a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

@endif

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>