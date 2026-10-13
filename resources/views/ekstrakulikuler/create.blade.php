<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ekstrakulikuler - MI Nurul Anwar</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

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

    <!-- NAVBAR -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">
            MI Nurul Anwar
        </a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
                id="sidebarToggle"
                type="button">
            <i class="fas fa-bars"></i>
        </button>

        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   id="navbarDropdown"
                   href="#"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- LAYOUT -->
    <div id="layoutSidenav">

        <!-- SIDEBAR -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion">

                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">
                            Core
                        </div>

                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">
                            Data Sekolah
                        </div>

                        <a class="nav-link" href="{{ url('/profil-sekolah') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-school"></i>
                            </div>
                            Profil Sekolah
                        </a>

                        <a class="nav-link" href="{{ url('/siswa') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            Data Siswa
                        </a>

                        <a class="nav-link" href="{{ url('/guru') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            Data Guru
                        </a>

                        <a class="nav-link" href="{{ route('berita.index') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            Berita
                        </a>

                        <a class="nav-link" href="{{ route('galeri.index') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-images"></i>
                            </div>
                            Galeri
                        </a>

                        <a class="nav-link active" href="{{ route('ekstrakulikuler.index') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-futbol"></i>
                            </div>
                            Ekstrakulikuler
                        </a>

                        @if(auth()->user()->role === 'Admin')
                            <div class="sb-sidenav-menu-heading">
                                Management User
                            </div>

                            <a class="nav-link" href="{{ route('user.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                User
                            </a>
                        @endif

                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">
                        Login sebagai:
                    </div>
                    {{ auth()->user()->name ?? 'Admin' }}
                </div>

            </nav>
        </div>

        <!-- CONTENT -->
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4">

                    <h1 class="mt-4">
                        Tambah Ekstrakulikuler
                    </h1>

                    <ol class="breadcrumb mb-4">

                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('ekstrakulikuler.index') }}">
                                Ekstrakulikuler
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Tambah
                        </li>

                    </ol>

                    <div class="card mb-4">

                        <div class="card-header">
                            <i class="fas fa-futbol me-1"></i>
                            Tambah Data Ekstrakulikuler
                        </div>

                        <div class="card-body">

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('ekstrakulikuler.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">
                                        Nama Ekstrakulikuler
                                    </label>

                                    <input type="text"
                                           name="nama_ekstrakulikuler"
                                           class="form-control"
                                           value="{{ old('nama_ekstrakulikuler') }}"
                                           placeholder="Masukkan nama ekstrakulikuler"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        Deskripsi
                                    </label>

                                    <textarea name="deskripsi"
                                              class="form-control"
                                              rows="5"
                                              placeholder="Masukkan deskripsi ekstrakulikuler"
                                              required>{{ old('deskripsi') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        Gambar
                                    </label>

                                    <input type="file"
                                           name="gambar"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="text-muted">
                                        Format JPG, JPEG, PNG. Maksimal 2 MB.
                                    </small>
                                </div>

                                <div class="d-flex gap-2">

                                    <button type="submit" class="btn btn-sidebar">
                                        <i class="fas fa-save me-1"></i>
                                        Simpan
                                    </button>

                                    <a href="{{ route('ekstrakulikuler.index') }}"
                                       class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Kembali
                                    </a>

                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </main>

            <!-- FOOTER -->
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

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>
</html>