<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Detail Guru MI Nurul Anwar">
    <meta name="author" content="MI Nurul Anwar">
    <title>Detail Guru - MI Nurul Anwar</title>

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

        .detail-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .foto-guru {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .foto-default {
            width: 180px;
            height: 180px;
            border-radius: 10px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .data-label {
            font-weight: bold;
            color: #555;
        }

        .data-value {
            color: #333;
        }
    </style>
</head>

<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark">

    <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">
        MI Nurul Anwar
    </a>

    <button
        class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
        id="sidebarToggle"
        type="button">
        <i class="fas fa-bars"></i>
    </button>

    <ul class="navbar-nav ms-auto me-3 me-lg-4">

        <li class="nav-item dropdown">

            <a
                class="nav-link dropdown-toggle"
                id="navbarDropdown"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                <i class="fas fa-user fa-fw"></i>

            </a>

            <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdown">

                <li>

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="dropdown-item">

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

        <nav
            class="sb-sidenav accordion"
            id="sidenavAccordion">

            <div class="sb-sidenav-menu">

                <div class="nav">

                    <div class="sb-sidenav-menu-heading">
                        CORE
                    </div>

                    <a
                        class="nav-link"
                        href="{{ route('dashboard') }}">

                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>

                        Dashboard

                    </a>

                    <div class="sb-sidenav-menu-heading">
                        DATA SEKOLAH
                    </div>

                    <a
                        class="nav-link"
                        href="{{ url('/profil-sekolah') }}">

                        <div class="sb-nav-link-icon">
                            <i class="fas fa-school"></i>
                        </div>

                        Profil Sekolah

                    </a>

                    <a
                        class="nav-link"
                        href="{{ url('/siswa') }}">

                        <div class="sb-nav-link-icon">
                            <i class="fas fa-users"></i>
                        </div>

                        Data Siswa

                    </a>

                    <a
                        class="nav-link active"
                        href="{{ url('/dashboard/guru') }}">

                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>

                        Data Guru

                    </a>

                    <a
                        class="nav-link"
                        href="{{ url('/dashboard/berita') }}">

                        <div class="sb-nav-link-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>

                        Berita

                    </a>

                    <a
                        class="nav-link"
                        href="{{ url('/dashboard/galeri') }}">

                        <div class="sb-nav-link-icon">
                            <i class="fas fa-images"></i>
                        </div>

                        Galeri

                    </a>

                    <a
                        class="nav-link"
                        href="{{ url('/dashboard/ekstrakulikuler') }}">

                        <div class="sb-nav-link-icon">
                            <i class="fas fa-futbol"></i>
                        </div>

                        Ekstrakulikuler

                    </a>

                    @if(Auth::user()->role === 'Admin')

                        <div class="sb-sidenav-menu-heading">
                            PENGATURAN
                        </div>

                        <a
                            class="nav-link"
                            href="{{ route('user.index') }}">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-user-cog"></i>
                            </div>

                            Management User

                        </a>

                    @endif

                </div>

            </div>

            <div class="sb-sidenav-footer">

                <div class="small">
                    Login sebagai:
                </div>

                {{ auth()->user()->name ?? 'User' }}

            </div>

        </nav>

    </div>

    <div id="layoutSidenav_content">

        <main>

            <div class="container-fluid px-4">

                <h1 class="mt-4">
                    Detail Guru
                </h1>

                <ol class="breadcrumb mb-4">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ url('/dashboard/guru') }}">
                            Data Guru
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Detail Guru
                    </li>

                </ol>

                <div class="card mb-4 detail-card">

                    <div class="card-header">

                        <i class="fas fa-chalkboard-teacher me-1"></i>

                        Detail Data Guru

                    </div>

                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col-md-4 text-center mb-4 mb-md-0">

                                @if($guru->foto)

                                    <img
                                        src="{{ asset('storage/guru/' . $guru->foto) }}"
                                        alt="Foto {{ $guru->nama_guru }}"
                                        class="foto-guru">

                                @else

                                    <div class="foto-default">

                                        <i class="fas fa-user fa-5x text-secondary"></i>

                                    </div>

                                @endif

                            </div>

                            <div class="col-md-8">

                                <div class="row mb-3">

                                    <div class="col-md-4 data-label">
                                        NIP
                                    </div>

                                    <div class="col-md-8 data-value">
                                        {{ $guru->nip }}
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-4 data-label">
                                        Nama Guru
                                    </div>

                                    <div class="col-md-8 data-value">
                                        {{ $guru->nama_guru }}
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-4 data-label">
                                        Jenis Kelamin
                                    </div>

                                    <div class="col-md-8 data-value">
                                        {{ $guru->jenis_kelamin }}
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-4 data-label">
                                        Mata Pelajaran
                                    </div>

                                    <div class="col-md-8 data-value">
                                        {{ $guru->mata_pelajaran }}
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-4 data-label">
                                        No HP
                                    </div>

                                    <div class="col-md-8 data-value">
                                        {{ $guru->no_hp ?? '-' }}
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-4 data-label">
                                        Alamat
                                    </div>

                                    <div class="col-md-8 data-value">
                                        {{ $guru->alamat ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="mt-4">

                            <!-- KEMBALI KE DASHBOARD DATA GURU -->
                            <a
                                href="{{ url('/dashboard/guru') }}"
                                class="btn btn-sidebar">

                                <i class="fas fa-arrow-left me-2"></i>

                                Kembali

                            </a>

                        </div>

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

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous">
</script>

<script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>
</html>