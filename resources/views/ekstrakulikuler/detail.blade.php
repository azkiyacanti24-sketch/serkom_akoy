<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Ekstrakurikuler - Profil Sekolah</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <style>
        .sb-topnav { background-color: #198754 !important; }
        #layoutSidenav_nav .sb-sidenav,
        #layoutSidenav_nav .sb-sidenav-menu,
        #layoutSidenav_nav .sb-sidenav-footer { background-color: #198754 !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link { color: #ffffff !important; background-color: #198754 !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link .sb-nav-link-icon { color: #ffffff !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link:hover { background-color: rgba(255, 255, 255, 0.12) !important; color: #ffffff !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link.active { background-color: rgba(255, 255, 255, 0.18) !important; color: #ffffff !important; }
        #layoutSidenav_nav .sb-sidenav-menu-heading { color: rgba(255, 255, 255, 0.7) !important; }
        #layoutSidenav_nav .sb-sidenav-footer { color: #ffffff !important; }
        .btn-sidebar { background-color: #198754 !important; border-color: #198754 !important; color: #ffffff !important; }
        .btn-sidebar:hover { background-color: #157347 !important; border-color: #157347 !important; color: #ffffff !important; }
        .ekstrakulikuler-detail-image { width: 100%; max-height: 450px; object-fit: cover; border-radius: 8px; }
    </style>
</head>
<body class="sb-nav-fixed">
    @if(Auth::check())
        <nav class="sb-topnav navbar navbar-expand">
            <a class="navbar-brand ps-3 text-white" href="{{ route('dashboard') }}">MI Nurul Anwar</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">CORE</div>
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">DATA SEKOLAH</div>
                            <a class="nav-link" href="/profil-sekolah">
                                <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                                Profil Sekolah
                            </a>
                            <a class="nav-link" href="/siswa">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                                Data Siswa
                            </a>
                            <a class="nav-link" href="/guru">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                Data Guru
                            </a>
                            <a class="nav-link" href="/berita">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                Berita
                            </a>
                            <a class="nav-link" href="/galeri">
                                <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                                Galeri
                            </a>
                            <a class="nav-link active" href="/ekstrakulikuler">
                                <div class="sb-nav-link-icon"><i class="fas fa-futbol"></i></div>
                                Ekstrakurikuler
                            </a>

                            @if(Auth::user()->role === 'Admin')
                                <div class="sb-sidenav-menu-heading">PENGATURAN</div>
                                <a class="nav-link" href="/user">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                    Management User
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="sb-sidenav-footer">
                        <div class="small">Login sebagai:</div>
                        {{ Auth::user()->role }}
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
    @else
        <div class="container-fluid px-4 py-3">
            <a href="{{ url('/') }}" class="btn btn-sidebar mb-3">
                <i class="fas fa-home me-1"></i> Kembali ke Beranda
            </a>
    @endif

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Detail Ekstrakurikuler</h1>

                        @if(Auth::check())
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ekstrakulikuler.index') }}">Ekstrakurikuler</a>
                                </li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        @endif

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-futbol me-1"></i>
                                Detail Ekstrakurikuler
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        @if($ekstrakulikuler->gambar)
                                            <img src="{{ asset('storage/' . $ekstrakulikuler->gambar) }}"
                                                alt="{{ $ekstrakulikuler->nama_ekstrakulikuler }}"
                                                class="ekstrakulikuler-detail-image">
                                        @else
                                            <div class="text-center p-5 bg-light rounded">
                                                <i class="fas fa-image fa-4x text-secondary"></i>
                                                <p class="mt-3 mb-0">Tidak ada gambar</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <h3 class="mb-4">{{ $ekstrakulikuler->nama_ekstrakulikuler }}</h3>

                                        <div class="mb-3">
                                            <strong>Nama Ekstrakurikuler</strong>
                                            <p class="mb-0">{{ $ekstrakulikuler->nama_ekstrakulikuler }}</p>
                                        </div>

                                        <hr>

                                        <div class="mb-4">
                                            <strong>Deskripsi</strong>
                                            <p class="mt-2">{{ $ekstrakulikuler->deskripsi }}</p>
                                        </div>

                                        @if(Auth::check())
                                            <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-sidebar">
                                                <i class="fas fa-arrow-left me-1"></i> Kembali
                                            </a>

                                            @if(Auth::user()->role === 'Admin')
                                                <form action="{{ route('ekstrakulikuler.edit') }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $ekstrakulikuler->id }}">
                                                    <button type="submit" class="btn btn-sidebar">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{ url('/') }}#ekstrakulikuler" class="btn btn-sidebar">
                                                <i class="fas fa-arrow-left me-1"></i> Kembali ke Ekstrakulikuler
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

    @if(Auth::check())
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; MI Nurul Anwar</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    @else
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @if(Auth::check())
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    @endif
</body>
</html>