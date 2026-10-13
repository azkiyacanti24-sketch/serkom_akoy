<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Edit Profil Sekolah - MI Nurul Anwar</title>
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
        .form-label { color: #198754; font-weight: 600; margin-bottom: 8px; }
        .form-control { border: 1px solid #d7ecdd; border-radius: 8px; padding: 11px 13px; }
        .form-control:focus { border-color: #198754; box-shadow: 0 0 0 0.2rem rgba(25,135,84,0.15); }
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
                <h1 class="mt-4">Edit Profil Sekolah</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/profil-sekolah') }}">Profil Sekolah</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-edit me-1"></i> Form Edit Profil Sekolah</div>
                    <div class="card-body">
                        <form action="{{ route('profil-sekolah.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Sekolah <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_sekolah" class="form-control"
                                           value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NSM</label>
                                    <input type="text" name="nsm" class="form-control"
                                           value="{{ old('nsm', $profil->nsm) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NPSN</label>
                                    <input type="text" name="npsn" class="form-control"
                                           value="{{ old('npsn', $profil->npsn) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Telp</label>
                                    <input type="text" name="telp" class="form-control"
                                           value="{{ old('telp', $profil->telp) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                           value="{{ old('email', $profil->email) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Website</label>
                                    <input type="text" name="website" class="form-control"
                                           value="{{ old('website', $profil->website) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Yayasan</label>
                                    <input type="text" name="nama_yayasan" class="form-control"
                                           value="{{ old('nama_yayasan', $profil->nama_yayasan) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kepala Sekolah <span class="text-danger">*</span></label>
                                    <input type="text" name="kepala_sekolah" class="form-control"
                                           value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                    <textarea name="alamat" rows="3" class="form-control" required>{{ old('alamat', $profil->alamat) }}</textarea>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Visi</label>
                                    <textarea name="visi" rows="3" class="form-control">{{ old('visi', $profil->visi) }}</textarea>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Misi</label>
                                    <textarea name="misi" rows="4" class="form-control">{{ old('misi', $profil->misi) }}</textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Logo Sekolah</label>
                                    @if($profil->logo)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $profil->logo) }}"
                                                 style="max-height:120px;border-radius:8px;border:1px solid #e2f3e8;padding:5px;">
                                        </div>
                                    @endif
                                    <input type="file" name="logo" class="form-control" accept=".jpg,.jpeg,.png">
                                    <small class="text-muted">Kosongkan jika tidak ingin ganti.</small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Foto Kepala Sekolah</label>
                                    @if($profil->foto)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $profil->foto) }}"
                                                 style="max-height:120px;border-radius:8px;border:1px solid #e2f3e8;padding:5px;">
                                        </div>
                                    @endif
                                    <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png">
                                    <small class="text-muted">Kosongkan jika tidak ingin ganti.</small>
                                </div>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ url('/profil-sekolah') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
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