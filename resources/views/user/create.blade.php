<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah User - MI Nurul Anwar</title>

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

        /* FOOTER */
        .dashboard-footer {
            background-color: #198754 !important;
            color: #ffffff;
            padding: 50px 0 0;
        }

        .dashboard-footer h4,
        .dashboard-footer h5 {
            color: #ffffff;
            font-weight: 600;
        }

        .dashboard-footer p {
            color: #ffffff;
            line-height: 1.7;
        }

        .dashboard-footer small {
            color: rgba(255, 255, 255, 0.85);
        }

        .dashboard-footer a {
            color: #ffffff;
            text-decoration: none;
        }

        .dashboard-footer a:hover {
            color: #d1e7dd;
        }

        .dashboard-footer .footer-logo {
            width: 55px;
            height: 55px;
            object-fit: contain;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 5px;
        }

        .dashboard-footer .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            margin-right: 8px;
        }

        .dashboard-footer .social-link:hover {
            background-color: #ffffff;
            color: #198754;
            border-color: #ffffff;
        }

        .dashboard-footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            margin-top: 40px;
            padding: 18px 0;
            color: rgba(255, 255, 255, 0.85);
        }
    </style>
</head>

<body class="sb-nav-fixed">

<!-- NAVBAR -->
<nav class="sb-topnav navbar navbar-expand navbar-dark">
    <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">
        MI Nurul Anwar
    </a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" type="button">
        <i class="fas fa-bars"></i>
    </button>

    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item">
            <a class="nav-link">
                <i class="fas fa-user fa-fw"></i>
            </a>
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

                    <!-- CORE -->
                    <div class="sb-sidenav-menu-heading">
                        CORE
                    </div>

                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Dashboard
                    </a>

                    <!-- DATA SEKOLAH -->
                    <div class="sb-sidenav-menu-heading">
                        DATA SEKOLAH
                    </div>

                    <a class="nav-link" href="{{ url('/profil-sekolah') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-school"></i>
                        </div>
                        Profil Sekolah
                    </a>

                    <a class="nav-link" href="{{ url('/siswa') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        Data Siswa
                    </a>

                    <a class="nav-link" href="{{ url('/guru') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        Data Guru
                    </a>

                    <a class="nav-link" href="{{ url('/berita') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        Berita
                    </a>

                    <a class="nav-link" href="{{ url('/galeri') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        Galeri
                    </a>

                    <a class="nav-link" href="{{ url('/ekstrakulikuler') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-futbol"></i>
                        </div>
                        Ekstrakurikuler
                    </a>

                    <!-- PENGATURAN -->
                    <div class="sb-sidenav-menu-heading">
                        PENGATURAN
                    </div>

                    <a class="nav-link active" href="{{ route('user.index') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        Management User
                    </a>

                </div>
            </div>

            <!-- SIDEBAR FOOTER -->
            <div class="sb-sidenav-footer">
                <div class="small">
                    Login sebagai:
                </div>
                {{ Auth::user()->name ?? 'Admin' }}
            </div>
        </nav>
    </div>

    <!-- CONTENT -->
    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-4">

                <!-- JUDUL -->
                <h1 class="mt-4">
                    Tambah User
                </h1>

                <!-- BREADCRUMB -->
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('user.index') }}">
                            Management User
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Tambah User
                    </li>
                </ol>

                <!-- CARD -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user-plus me-1"></i>
                        Form Tambah User
                    </div>

                    <div class="card-body">

                        <!-- ERROR -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- FORM -->
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf

                            <!-- NAMA -->
                            <div class="mb-3">
                                <label class="form-label">
                                    Nama
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    placeholder="Masukkan nama user"
                                    required>
                            </div>

                            <!-- USERNAME -->
                            <div class="mb-3">
                                <label class="form-label">
                                    Username
                                </label>

                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    value="{{ old('username') }}"
                                    placeholder="Masukkan username"
                                    required>
                            </div>

                            <!-- PASSWORD -->
                            <div class="mb-3">
                                <label class="form-label">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required>
                            </div>

                            <!-- ROLE -->
                            <div class="mb-3">
                                <label class="form-label">
                                    Role
                                </label>

                                <select
                                    name="role"
                                    class="form-select"
                                    required>

                                    <option value="">
                                        -- Pilih Role --
                                    </option>

                                    <option
                                        value="Admin"
                                        {{ old('role') == 'Admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                    <option
                                        value="Operator"
                                        {{ old('role') == 'Operator' ? 'selected' : '' }}>
                                        Operator
                                    </option>

                                </select>
                            </div>

                            <!-- TOMBOL -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-sidebar">
                                    <i class="fas fa-save me-1"></i>
                                    Simpan
                                </button>

                                <a href="{{ route('user.index') }}" class="btn btn-secondary">
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

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>
</html>