<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Siswa - MI Nurul Anwar</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .sb-topnav {
            background-color: #198754 !important;
        }
        #layoutSidenav_nav .sb-sidenav,
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu,
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-footer {
            background-color: #198754 !important;
        }
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu-heading {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        #layoutSidenav_nav .sb-sidenav .nav-link {
            color: #ffffff !important;
        }
        #layoutSidenav_nav .sb-sidenav .nav-link .sb-nav-link-icon {
            color: #ffffff !important;
        }
        #layoutSidenav_nav .sb-sidenav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.12) !important;
            color: #ffffff !important;
        }
        #layoutSidenav_nav .sb-sidenav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.18) !important;
            color: #ffffff !important;
        }
        #layoutSidenav_nav .sb-sidenav-footer {
            color: #ffffff !important;
        }
        .btn-sidebar {
            background-color: #198754 !important;
            border-color: #198754 !important;
            color: #ffffff !important;
        }
        .btn-sidebar:hover {
            background-color: #157347 !important;
            border-color: #157347 !important;
            color: #ffffff !important;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <a class="navbar-brand ps-3" href="{{ url('/') }}">MI Nurul Anwar</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
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
            <nav class="sb-sidenav accordion" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">CORE</div>

                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">DATA SEKOLAH</div>

                        <a class="nav-link" href="{{ url('/profil-sekolah') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-school"></i>
                            </div>
                            Profil Sekolah
                        </a>

                        <a class="nav-link active" href="{{ url('/siswa') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            Data Siswa
                        </a>

                        <a class="nav-link" href="{{ url('/dashboard/guru') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            Data Guru
                        </a>

                        <a class="nav-link" href="{{ url('/dashboard/berita') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            Berita
                        </a>

                        <a class="nav-link" href="{{ url('/dashboard/galeri') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-images"></i>
                            </div>
                            Galeri
                        </a>

                        <a class="nav-link" href="{{ url('/dashboard/ekstrakulikuler') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-futbol"></i>
                            </div>
                            Ekstrakurikuler
                        </a>

                        @if(auth()->check() && auth()->user()->role === 'Admin')
                            <div class="sb-sidenav-menu-heading">PENGATURAN</div>

                            <a class="nav-link" href="{{ route('user.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-user-cog"></i>
                                </div>
                                Management User
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
                    <h1 class="mt-4">Edit Data Siswa</h1>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/siswa') }}">Data Siswa</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user-edit me-1"></i>
                            Edit Data Siswa
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Data belum berhasil disimpan!</strong>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- FORM EDIT --}}
                            <form action="{{ route('siswa.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">

                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select" required>
                                        <option value="">-- Pilih Kelas --</option>

                                        <optgroup label="Kelas 1">
                                            <option value="1A" {{ old('kelas', $siswa->kelas) == '1A' ? 'selected' : '' }}>1A</option>
                                            <option value="1B" {{ old('kelas', $siswa->kelas) == '1B' ? 'selected' : '' }}>1B</option>
                                            <option value="1C" {{ old('kelas', $siswa->kelas) == '1C' ? 'selected' : '' }}>1C</option>
                                            <option value="1D" {{ old('kelas', $siswa->kelas) == '1D' ? 'selected' : '' }}>1D</option>
                                        </optgroup>

                                        <optgroup label="Kelas 2">
                                            <option value="2A" {{ old('kelas', $siswa->kelas) == '2A' ? 'selected' : '' }}>2A</option>
                                            <option value="2B" {{ old('kelas', $siswa->kelas) == '2B' ? 'selected' : '' }}>2B</option>
                                            <option value="2C" {{ old('kelas', $siswa->kelas) == '2C' ? 'selected' : '' }}>2C</option>
                                            <option value="2D" {{ old('kelas', $siswa->kelas) == '2D' ? 'selected' : '' }}>2D</option>
                                        </optgroup>

                                        <optgroup label="Kelas 3">
                                            <option value="3A" {{ old('kelas', $siswa->kelas) == '3A' ? 'selected' : '' }}>3A</option>
                                            <option value="3B" {{ old('kelas', $siswa->kelas) == '3B' ? 'selected' : '' }}>3B</option>
                                            <option value="3C" {{ old('kelas', $siswa->kelas) == '3C' ? 'selected' : '' }}>3C</option>
                                            <option value="3D" {{ old('kelas', $siswa->kelas) == '3D' ? 'selected' : '' }}>3D</option>
                                        </optgroup>

                                        <optgroup label="Kelas 4">
                                            <option value="4A" {{ old('kelas', $siswa->kelas) == '4A' ? 'selected' : '' }}>4A</option>
                                            <option value="4B" {{ old('kelas', $siswa->kelas) == '4B' ? 'selected' : '' }}>4B</option>
                                            <option value="4C" {{ old('kelas', $siswa->kelas) == '4C' ? 'selected' : '' }}>4C</option>
                                            <option value="4D" {{ old('kelas', $siswa->kelas) == '4D' ? 'selected' : '' }}>4D</option>
                                        </optgroup>

                                        <optgroup label="Kelas 5">
                                            <option value="5A" {{ old('kelas', $siswa->kelas) == '5A' ? 'selected' : '' }}>5A</option>
                                            <option value="5B" {{ old('kelas', $siswa->kelas) == '5B' ? 'selected' : '' }}>5B</option>
                                            <option value="5C" {{ old('kelas', $siswa->kelas) == '5C' ? 'selected' : '' }}>5C</option>
                                            <option value="5D" {{ old('kelas', $siswa->kelas) == '5D' ? 'selected' : '' }}>5D</option>
                                        </optgroup>

                                        <optgroup label="Kelas 6">
                                            <option value="6A" {{ old('kelas', $siswa->kelas) == '6A' ? 'selected' : '' }}>6A</option>
                                            <option value="6B" {{ old('kelas', $siswa->kelas) == '6B' ? 'selected' : '' }}>6B</option>
                                            <option value="6C" {{ old('kelas', $siswa->kelas) == '6C' ? 'selected' : '' }}>6C</option>
                                            <option value="6D" {{ old('kelas', $siswa->kelas) == '6D' ? 'selected' : '' }}>6D</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                    <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk', $siswa->tahun_masuk ?? '') }}" required>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save me-1"></i>
                                        Simpan
                                    </button>

                                    <a href="{{ url('/siswa') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">
                            Copyright &copy; MI Nurul Anwar 2026
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>