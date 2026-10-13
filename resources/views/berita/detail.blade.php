<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Detail Berita - Profil Sekolah</title>

    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        .sb-topnav {
            background-color: #198754 !important;
        }

        #layoutSidenav_nav .sb-sidenav,
        #layoutSidenav_nav .sb-sidenav-menu,
        #layoutSidenav_nav .sb-sidenav-footer {
            background-color: #198754 !important;
        }

        #layoutSidenav_nav .sb-sidenav .nav-link {
            color: #ffffff !important;
            background-color: #198754 !important;
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

        #layoutSidenav_nav .sb-sidenav-menu-heading {
            color: rgba(255, 255, 255, 0.7) !important;
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

        .berita-detail-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
        }

        .berita-placeholder {
            width: 100%;
            height: 350px;
            background-color: #f1f1f1;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand">
        <a class="navbar-brand ps-3 text-white" href="{{ route('dashboard') }}">
            MI Nurul Anwar
        </a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white"
                id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle text-white"
                   id="navbarDropdown"
                   href="#"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdown">

                    <li>
                        <span class="dropdown-item-text">
                            {{ Auth::user()->username }}
                        </span>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

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

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion">

                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">
                            CORE
                        </div>

                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">
                            DATA SEKOLAH
                        </div>

                        <a class="nav-link" href="/profil-sekolah">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-school"></i>
                            </div>
                            Profil Sekolah
                        </a>

                        <a class="nav-link" href="/siswa">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            Data Siswa
                        </a>

                        <a class="nav-link" href="/guru">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            Data Guru
                        </a>

                        <a class="nav-link active" href="{{ route('berita.index') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            Berita
                        </a>

                        <a class="nav-link" href="/galeri">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-images"></i>
                            </div>
                            Galeri
                        </a>

                        <a class="nav-link" href="/ekstrakulikuler">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-futbol"></i>
                            </div>
                            Ekstrakurikuler
                        </a>

                        @if(Auth::user()->role === 'Admin')
                            <div class="sb-sidenav-menu-heading">
                                PENGATURAN
                            </div>

                            <a class="nav-link" href="/user">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users-cog"></i>
                                </div>
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

            <main>
                <div class="container-fluid px-4">

                    <h1 class="mt-4">
                        Detail Berita
                    </h1>

                    <ol class="breadcrumb mb-4">

                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('berita.index') }}">
                                Berita
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Detail
                        </li>

                    </ol>

                    <div class="card mb-4">

                        <div class="card-header">
                            <i class="fas fa-newspaper me-1"></i>
                            Detail Berita
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-5 mb-4">

                                    @if($berita->foto)

                                        <img src="{{ asset('storage/berita/' . $berita->foto) }}"
                                             alt="{{ $berita->judul }}"
                                             class="berita-detail-img">

                                    @else

                                        <div class="berita-placeholder">

                                            <div class="text-center">

                                                <i class="fas fa-image fa-3x mb-2"></i>

                                                <br>

                                                Tidak ada foto

                                            </div>

                                        </div>

                                    @endif

                                </div>

                                <div class="col-md-7">

                                    <h3 class="mb-4">
                                        {{ $berita->judul }}
                                    </h3>

                                    <div class="mb-3">

                                        <strong>Tanggal</strong>

                                        <p class="mb-0">
                                            {{ $berita->tanggal }}
                                        </p>

                                    </div>

                                    @if(Auth::user()->role === 'Admin')

                                        <hr>

                                        <div class="mb-3">

                                            <strong>Status</strong>

                                            <p class="mb-0 mt-2">

                                                @if($berita->status === 'Publik')

                                                    <span class="badge bg-success">
                                                        Publik
                                                    </span>

                                                @else

                                                    <span class="badge bg-secondary">
                                                        Privat
                                                    </span>

                                                @endif

                                            </p>

                                        </div>

                                    @endif

                                    <hr>

                                    <div class="mb-4">

                                        <strong>Isi Berita</strong>

                                        <p class="mt-2">
                                            {!! nl2br(e($berita->isi)) !!}
                                        </p>

                                    </div>

                                    <a href="{{ route('berita.index') }}"
                                       class="btn btn-sidebar">

                                        <i class="fas fa-arrow-left me-1"></i>
                                        Kembali

                                    </a>

                                    @if(Auth::user()->role === 'Admin')

                                        <a href="{{ route('berita.edit', $berita->id) }}"
                                           class="btn btn-sidebar">

                                            <i class="fas fa-edit me-1"></i>
                                            Edit

                                        </a>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">

                <div class="container-fluid px-4">

                    <div class="d-flex align-items-center justify-content-between small">

                        <div class="text-muted">
                            Copyright &copy; MI Nurul Anwar
                        </div>

                    </div>

                </div>

            </footer>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>
</html>