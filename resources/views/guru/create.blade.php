<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru - MI Nurul Anwar</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

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
        .btn-sidebar { background-color: #198754 !important; border-color: #198754 !important; color: #ffffff !important; }
        .btn-sidebar:hover { background-color: #157347 !important; border-color: #157347 !important; color: #ffffff !important; }

        .guru-wrapper { width: 100%; padding: 10px 5px 30px; }
        .guru-card { background: #ffffff; border: 1px solid #e2f3e8; border-radius: 14px; box-shadow: 0 4px 15px rgba(25,135,84,0.07); overflow: hidden; }
        .guru-card-body { padding: 25px; }
        .form-label { color: #198754; font-weight: 600; margin-bottom: 8px; }
        .form-control, .form-select { border: 1px solid #d7ecdd; border-radius: 8px; padding: 11px 13px; }
        .form-control:focus, .form-select:focus { border-color: #198754; box-shadow: 0 0 0 0.2rem rgba(25,135,84,0.15); }
        .file-info { color: #6c757d; font-size: 13px; margin-top: 7px; line-height: 1.7; }
        .preview-container { margin-top: 15px; padding: 15px; border: 1px dashed #cbd8e6; border-radius: 10px; background: #f8fafc; }
        .preview-container img { display: block; width: 100%; max-width: 200px; max-height: 260px; object-fit: cover; border-radius: 8px; margin-top: 10px; }
        .guru-actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 25px; padding-top: 20px; border-top: 1px solid #e2f3e8; }
        .btn-simpan { background: #198754; color: #ffffff; border: none; border-radius: 8px; padding: 10px 20px; font-weight: 600; }
        .btn-simpan:hover { background: #157347; color: #ffffff; }
        .btn-kembali { background: #eef7f2; color: #198754; border-radius: 8px; padding: 10px 20px; font-weight: 600; text-decoration: none; }
        .btn-kembali:hover { background: #dfeee6; color: #198754; }

        @media (max-width: 576px) {
            .guru-card-body { padding: 18px; }
            .guru-actions { flex-direction: column; }
            .guru-actions .btn, .guru-actions a { text-align: center; width: 100%; }
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <!-- NAVBAR -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">MI Nurul Anwar</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <!-- SIDEBAR -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Data Sekolah</div>
                        <a class="nav-link" href="{{ url('/profil-sekolah') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                            Profil Sekolah
                        </a>
                        <a class="nav-link" href="{{ url('/siswa') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                            Data Siswa
                        </a>
                        <a class="nav-link active" href="{{ url('/dashboard/guru') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Data Guru
                        </a>
                        <a class="nav-link" href="{{ route('berita.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                            Berita
                        </a>
                        <a class="nav-link" href="{{ route('galeri.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                            Galeri
                        </a>
                        <a class="nav-link" href="{{ route('ekstrakulikuler.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-futbol"></i></div>
                            Ekstrakulikuler
                        </a>

                        @if(auth()->user()->role === 'Admin')
                            <div class="sb-sidenav-menu-heading">Management User</div>
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                User
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

        <!-- CONTENT -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <h1 class="mt-4">Tambah Guru</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard/guru') }}">Data Guru</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>

                    <div class="guru-wrapper">
                        <div class="guru-card">
                            <div class="guru-card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Data belum berhasil disimpan.</strong>
                                        <ul class="mb-0 mt-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('guru.store') }}"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    @csrf

                                    <div class="row">

                                        {{-- NIP --}}
                                        <div class="col-md-6 mb-3">
                                            <label for="nip" class="form-label">NIP</label>
                                            <input type="text" name="nip" id="nip"
                                                   class="form-control @error('nip') is-invalid @enderror"
                                                   value="{{ old('nip') }}"
                                                   placeholder="Contoh: 12345678" required>
                                            @error('nip')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- NAMA GURU --}}
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_guru" class="form-label">Nama Guru</label>
                                            <input type="text" name="nama_guru" id="nama_guru"
                                                   class="form-control @error('nama_guru') is-invalid @enderror"
                                                   value="{{ old('nama_guru') }}"
                                                   placeholder="Contoh: Juriyah" required>
                                            @error('nama_guru')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- JENIS KELAMIN --}}
                                        <div class="col-md-6 mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin"
                                                    class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- MATA PELAJARAN --}}
                                        <div class="col-md-6 mb-3">
                                            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                                            <select name="mata_pelajaran" id="mata_pelajaran"
                                                    class="form-select @error('mata_pelajaran') is-invalid @enderror" required>
                                                <option value="">-- Pilih Mata Pelajaran --</option>
                                                @foreach($mapels as $mapel)
                                                    <option value="{{ $mapel->nama_mapel }}" {{ old('mata_pelajaran') == $mapel->nama_mapel ? 'selected' : '' }}>
                                                        {{ $mapel->nama_mapel }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('mata_pelajaran')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- NO HP --}}
                                        <div class="col-md-6 mb-3">
                                            <label for="no_hp" class="form-label">No. HP (Opsional)</label>
                                            <input type="text" name="no_hp" id="no_hp"
                                                   class="form-control @error('no_hp') is-invalid @enderror"
                                                   value="{{ old('no_hp') }}"
                                                   placeholder="Contoh: 08123456789">
                                            @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- FOTO --}}
                                        <div class="col-md-6 mb-3">
                                            <label for="foto" class="form-label">Foto (Opsional)</label>
                                            <input type="file" name="foto" id="foto"
                                                   class="form-control @error('foto') is-invalid @enderror"
                                                   accept=".jpg,.jpeg,.png">
                                            <div class="file-info">
                                                Format: JPG, JPEG, PNG. Maks 2 MB.
                                            </div>
                                            @error('foto')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- ALAMAT --}}
                                        <div class="col-12 mb-3">
                                            <label for="alamat" class="form-label">Alamat (Opsional)</label>
                                            <textarea name="alamat" id="alamat" rows="3"
                                                      class="form-control @error('alamat') is-invalid @enderror"
                                                      placeholder="Tuliskan alamat...">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- PREVIEW FOTO --}}
                                        <div class="col-12" id="previewFoto" style="display: none;">
                                            <div class="preview-container">
                                                <strong>Preview Foto</strong>
                                                <img id="fotoPreview" src="" alt="Preview Foto">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="guru-actions">
                                        <a href="{{ url('/dashboard/guru') }}" class="btn-kembali">Batal</a>
                                        <button type="submit" class="btn btn-simpan">Simpan Guru</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MI Nurul Anwar 2026</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fotoInput = document.getElementById('foto');
            const previewFoto = document.getElementById('previewFoto');
            const fotoPreview = document.getElementById('fotoPreview');

            fotoInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file && file.type.startsWith('image/')) {
                    fotoPreview.src = URL.createObjectURL(file);
                    previewFoto.style.display = 'block';
                } else {
                    previewFoto.style.display = 'none';
                }
            });
        });
    </script>

</body>
</html>