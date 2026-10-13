<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Sekolah - MI Nurul Anwar</title>
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

        .info-table th { color: #198754; width: 200px; vertical-align: top; }
        .sambutan-box { background: #f8f9fa; border-left: 4px solid #198754; padding: 20px; border-radius: 8px; line-height: 1.8; white-space: pre-line; }
        .visi-box { background: #e8f5e9; border-radius: 10px; padding: 20px; text-align: center; font-style: italic; font-size: 18px; color: #198754; font-weight: 500; }
        .misi-list { padding-left: 20px; line-height: 1.9; }
    </style>
</head>
<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark">
    <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">MI Nurul Anwar</a>
    <button class="btn btn-link btn-sm me-4" id="sidebarToggle" type="button"><i class="fas fa-bars"></i></button>
    <ul class="navbar-nav ms-auto me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fas fa-user fa-fw"></i></a>
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
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">DATA SEKOLAH</div>
                    <a class="nav-link active" href="{{ url('/profil-sekolah') }}">
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

                    @if(auth()->user()->role === 'Admin')
                        <div class="sb-sidenav-menu-heading">MANAGEMENT USER</div>
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Management user
                        </a>
                    @endif
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
                <h1 class="mt-4">Profil Sekolah</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profil Sekolah</li>
                </ol>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(!$profil)
                    <div class="alert alert-warning">Data profil sekolah belum tersedia.</div>
                @else
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>
                                <i class="fas fa-school me-1"></i> Profil {{ $profil->nama_sekolah }}
                            </span>

                            @if(auth()->user()->role === 'Admin')
                                <div class="d-flex gap-2">
                                    <a href="{{ route('profil-sekolah.edit') }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('profil-sekolah.delete') }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data profil sekolah?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 text-center mb-3">
                                    @if($profil->logo)
                                        <img src="{{ asset('storage/' . $profil->logo) }}"
                                             class="img-fluid mb-3" style="max-height:180px;">
                                    @else
                                        <i class="fas fa-school fa-5x text-secondary mb-3"></i>
                                    @endif

                                    @if($profil->foto)
                                        <img src="{{ asset('storage/' . $profil->foto) }}"
                                             class="img-fluid rounded" style="max-height:220px;">
                                        <p class="fw-bold mt-2 mb-0">{{ $profil->kepala_sekolah }}</p>
                                        <small class="text-muted">Kepala Sekolah</small>
                                    @endif
                                </div>

                                <div class="col-md-9">
                                    <table class="table table-borderless info-table">
                                        <tr><th>Nama Madrasah</th><td>: {{ $profil->nama_sekolah }}</td></tr>
                                        <tr><th>NSM</th><td>: {{ $profil->nsm ?? '-' }}</td></tr>
                                        <tr><th>NPSN</th><td>: {{ $profil->npsn ?? '-' }}</td></tr>
                                        <tr><th>Alamat</th><td>: {{ $profil->alamat ?? '-' }}</td></tr>
                                        <tr><th>Telp.</th><td>: {{ $profil->telp ?? '-' }}</td></tr>
                                        <tr><th>Email</th><td>: {{ $profil->email ?? '-' }}</td></tr>
                                        <tr><th>Website</th><td>: {{ $profil->website ?? '-' }}</td></tr>
                                        <tr><th>Nama Yayasan</th><td>: {{ $profil->nama_yayasan ?? '-' }}</td></tr>
                                        <tr><th>Kepala Sekolah</th><td>: {{ $profil->kepala_sekolah ?? '-' }}</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($profil->sambutan)
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-comment-dots me-1"></i> Sambutan
                            </div>
                            <div class="card-body">
                                <div class="sambutan-box">{{ $profil->sambutan }}</div>
                            </div>
                        </div>
                    @endif

                    @if($profil->visi)
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-eye me-1"></i> Visi
                            </div>
                            <div class="card-body">
                                <div class="visi-box">"{{ $profil->visi }}"</div>
                            </div>
                        </div>
                    @endif

                    @if($profil->misi)
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-bullseye me-1"></i> Misi
                            </div>
                            <div class="card-body">
                                <div class="misi-list">{!! nl2br(e($profil->misi)) !!}</div>
                            </div>
                        </div>
                    @endif
                @endif
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