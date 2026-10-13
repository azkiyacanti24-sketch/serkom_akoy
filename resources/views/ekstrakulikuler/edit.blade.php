<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edit Ekstrakulikuler - Profil Sekolah</title>

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

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.15);
        }

        .foto-sekarang {
            width: 100%;
            max-width: 350px;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }

        .label-form {
            font-weight: 600;
            margin-bottom: 8px;
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

                        <a class="nav-link active" href="{{ url('/dashboard/ekstrakulikuler') }}">

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

                    {{ auth()->user()->role }}

                </div>

            </nav>

        </div>

        <!-- CONTENT -->
        <div id="layoutSidenav_content">

            <main>

                <div class="container-fluid px-4">

                    <h1 class="mt-4">
                        Edit Ekstrakulikuler
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
                            Edit
                        </li>

                    </ol>

                    <!-- NOTIFIKASI ERROR -->
                    @if($errors->any())

                        <div class="alert alert-danger">

                            <strong>Periksa kembali data yang kamu masukkan.</strong>

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <!-- FORM EDIT -->
                    <div class="card mb-4">

                        <div class="card-header">

                            <i class="fas fa-edit me-1"></i>
                            Form Edit Ekstrakulikuler

                        </div>

                        <div class="card-body">

                            <form action="{{ route('ekstrakulikuler.update') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <input type="hidden"
                                       name="id"
                                       value="{{ $data->id }}">

                                <!-- NAMA EKSTRAKULIKULER -->
                                <div class="mb-3">

                                    <label for="nama_ekstrakulikuler" class="form-label label-form">
                                        Nama Ekstrakulikuler
                                    </label>

                                    <input type="text"
                                           name="nama_ekstrakulikuler"
                                           id="nama_ekstrakulikuler"
                                           class="form-control @error('nama_ekstrakulikuler') is-invalid @enderror"
                                           value="{{ old('nama_ekstrakulikuler', $data->nama_ekstrakulikuler) }}"
                                           placeholder="Masukkan nama ekstrakulikuler"
                                           required>

                                    @error('nama_ekstrakulikuler')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- DESKRIPSI -->
                                <div class="mb-3">

                                    <label for="deskripsi" class="form-label label-form">
                                        Deskripsi
                                    </label>

                                    <textarea name="deskripsi"
                                              id="deskripsi"
                                              class="form-control @error('deskripsi') is-invalid @enderror"
                                              rows="5"
                                              placeholder="Masukkan deskripsi ekstrakulikuler">{{ old('deskripsi', $data->deskripsi) }}</textarea>

                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- FOTO SAAT INI -->
                                <div class="mb-3">

                                    <label class="form-label label-form">
                                        Foto Saat Ini
                                    </label>

                                    <div>

                                        @if($data->gambar)

                                            <img src="{{ asset('storage/' . $data->gambar) }}"
                                                 alt="{{ $data->nama_ekstrakulikuler }}"
                                                 class="foto-sekarang">

                                        @else

                                            <div class="border rounded bg-light text-secondary text-center p-5"
                                                 style="max-width: 350px;">

                                                <i class="fas fa-futbol fa-3x mb-2"></i>

                                                <p class="mb-0">
                                                    Belum ada foto
                                                </p>

                                            </div>

                                        @endif

                                    </div>

                                </div>

                                <!-- GANTI FOTO -->
                                <div class="mb-4">

                                    <label for="gambar" class="form-label label-form">
                                        Ganti Foto Ekstrakulikuler
                                    </label>

                                    <input type="file"
                                           name="gambar"
                                           id="gambar"
                                           class="form-control @error('gambar') is-invalid @enderror"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="text-muted">
                                        Foto boleh dikosongkan jika tidak ingin menggantinya.
                                        Format JPG, JPEG, atau PNG, maksimal 2 MB.
                                    </small>

                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <div class="mt-3">

                                        <img id="previewGambar"
                                             src="#"
                                             alt="Preview foto baru"
                                             class="foto-sekarang"
                                             style="display: none;">

                                    </div>

                                </div>

                                <!-- TOMBOL -->
                                <div class="d-flex gap-2 flex-wrap">

                                    <button type="submit" class="btn btn-sidebar">

                                        <i class="fas fa-save me-1"></i>
                                        Simpan Perubahan

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
                            © {{ date('Y') }} MI Nurul Anwar
                        </div>

                        <div class="text-muted">
                            Bekasi Timur
                        </div>

                    </div>

                </div>

            </footer>

        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script>
        document.getElementById('gambar').addEventListener('change', function (event) {

            const file = event.target.files[0];
            const preview = document.getElementById('previewGambar');

            if (file) {

                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';

            } else {

                preview.src = '#';
                preview.style.display = 'none';

            }

        });
    </script>

</body>
</html>