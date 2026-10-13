<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Dashboard - MI Nurul Anwar</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .sb-topnav { background-color: #198754 !important; }
        #layoutSidenav_nav .sb-sidenav,
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu,
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-footer { background-color: #198754 !important; }
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu-heading { color: rgba(255,255,255,0.7) !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link { color: #ffffff !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link .sb-nav-link-icon { color: #ffffff !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link:hover { background-color: rgba(255,255,255,0.12) !important; color: #ffffff !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link.active { background-color: rgba(255,255,255,0.18) !important; color: #ffffff !important; }
        #layoutSidenav_nav .sb-sidenav-footer { color: #ffffff !important; }
    </style>
</head>
<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark">
    <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">MI Nurul Anwar</a>
    <button class="btn btn-link btn-sm me-4" id="sidebarToggle" type="button"><i class="fas fa-bars"></i></button>
    <ul class="navbar-nav ms-auto me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">CORE</div>
                    <a class="nav-link active" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">DATA SEKOLAH</div>
                    <a class="nav-link" href="{{ url('/profil-sekolah') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                        Profil Sekolah
                    </a>
                    <a class="nav-link" href="{{ url('/siswa') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Data Siswa
                    </a>
                    <a class="nav-link" href="{{ url('/dashboard/guru') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        Data Guru
                    </a>
                    <a class="nav-link" href="{{ url('/dashboard/berita') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                        Berita
                    </a>
                    <a class="nav-link" href="{{ url('/dashboard/galeri') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                        Galeri
                    </a>
                    <a class="nav-link" href="{{ url('/dashboard/ekstrakulikuler') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-futbol"></i></div>
                        Ekstrakurikuler
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Login sebagai:</div>
                {{ auth()->user()->name ?? 'Admin' }}
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div>Total Guru</div>
                                <div class="h4">{{ $totalGuru }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div>Total Siswa</div>
                                <div class="h4">{{ $totalSiswa }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div>Total Berita</div>
                                <div class="h4">{{ $totalBerita }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div>Total Galeri</div>
                                <div class="h4">{{ $totalGaleri }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-school me-1"></i> Informasi Sekolah</div>
                    <div class="card-body">
                        @if($profil)
                            <p><strong>Nama Sekolah:</strong> {{ $profil->nama_sekolah }}</p>
                            <p><strong>Kepala Sekolah:</strong> {{ $profil->kepala_sekolah }}</p>
                            <p class="mb-0"><strong>Alamat:</strong> {{ $profil->alamat }}</p>
                        @else
                            <p class="text-muted mb-0">Data profil sekolah belum tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="text-muted">Copyright &copy; MI Nurul Anwar {{ date('Y') }}</div>
            </div>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>
</html>