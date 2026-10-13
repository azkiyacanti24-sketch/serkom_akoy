<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - MI Nurul Anwar</title>
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

                <ul class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdown">

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

            <nav class="sb-sidenav accordion"
                 id="sidenavAccordion">

                <div class="sb-sidenav-menu">

                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">
                            Core
                        </div>

                        <a class="nav-link"
                           href="{{ route('dashboard') }}">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>

                            Dashboard

                        </a>

                        <div class="sb-sidenav-menu-heading">
                            Data Sekolah
                        </div>

                        <a class="nav-link"
                           href="{{ url('/profil-sekolah') }}">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-school"></i>
                            </div>

                            Profil Sekolah

                        </a>

                        <a class="nav-link"
                           href="{{ url('/siswa') }}">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>

                            Data Siswa

                        </a>

                        <a class="nav-link"
                           href="{{ url('/dashboard/guru') }}">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>

                            Data Guru

                        </a>

                        <a class="nav-link active"
                           href="{{ url('/dashboard/berita') }}">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>

                            Berita

                        </a>

                        <a class="nav-link"
                           href="{{ url('/dashboard/galeri') }}">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-images"></i>
                            </div>

                            Galeri

                        </a>

                        <a class="nav-link"
                           href="{{ url('/dashboard/ekstrakulikuler') }}">

                            <div class="sb-nav-link-icon">
                                <i class="fas fa-futbol"></i>
                            </div>

                            Ekstrakulikuler

                        </a>

                        @if(auth()->user()->role === 'Admin')

                            <div class="sb-sidenav-menu-heading">
                                Management User
                            </div>

                            <a class="nav-link"
                               href="{{ route('user.index') }}">

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

                    {{ auth()->user()->role }}

                </div>

            </nav>

        </div>

        <!-- CONTENT -->
        <div id="layoutSidenav_content">

            <main>

                <div class="container-fluid px-4">

                    <h1 class="mt-4">
                        Edit Berita
                    </h1>

                    <ol class="breadcrumb mb-4">

                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item">

                            <a href="{{ url('/dashboard/berita') }}">
                                Berita
                            </a>

                        </li>

                        <li class="breadcrumb-item active">
                            Edit
                        </li>

                    </ol>

                    <div class="card mb-4">

                        <div class="card-header">

                            <i class="fas fa-edit me-1"></i>
                            Edit Data Berita

                        </div>

                        <div class="card-body">

                            @if($errors->any())

                                <div class="alert alert-danger">

                                    <ul class="mb-0">

                                        @foreach($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endif

                            <form action="{{ route('berita.update') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <input type="hidden"
                                       name="berita_id"
                                       value="{{ $berita->getKey() }}">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Judul Berita
                                    </label>

                                    <input type="text"
                                           name="judul"
                                           class="form-control"
                                           value="{{ old('judul', $berita->judul) }}"
                                           required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Isi Berita
                                    </label>

                                    <textarea name="isi"
                                              class="form-control"
                                              rows="6"
                                              required>{{ old('isi', $berita->isi) }}</textarea>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Tanggal
                                    </label>

                                    <input type="date"
                                           name="tanggal"
                                           class="form-control"
                                           value="{{ old('tanggal', $berita->tanggal) }}"
                                           required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Status
                                    </label>

                                    <select name="status"
                                            class="form-select"
                                            required>

                                        <option value="Privat"
                                            {{ old('status', $berita->status) == 'Privat' ? 'selected' : '' }}>
                                            Privat
                                        </option>

                                        <option value="Publik"
                                            {{ old('status', $berita->status) == 'Publik' ? 'selected' : '' }}>
                                            Publik
                                        </option>

                                    </select>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Foto Saat Ini
                                    </label>

                                    @if($berita->foto)

                                        <div class="mb-3">

                                            <img src="{{ asset('storage/berita/' . $berita->foto) }}"
                                                 alt="{{ $berita->judul }}"
                                                 style="width: 250px; height: 160px; object-fit: cover;"
                                                 class="img-thumbnail">

                                        </div>

                                    @else

                                        <p class="text-muted">
                                            Belum ada foto.
                                        </p>

                                    @endif

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Ganti Foto
                                    </label>

                                    <input type="file"
                                           name="foto"
                                           class="form-control"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengganti foto.
                                        Format JPG, JPEG, PNG. Maksimal 2 MB.
                                    </small>

                                </div>

                                <div class="d-flex gap-2">

                                    <button type="submit"
                                            class="btn btn-sidebar">

                                        <i class="fas fa-save me-1"></i>
                                        Simpan Perubahan

                                    </button>

                                    <a href="{{ url('/dashboard/berita') }}"
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