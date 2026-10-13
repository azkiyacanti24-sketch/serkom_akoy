<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri - MI Nurul Anwar</title>
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

        .galeri-wrapper { width: 100%; padding: 10px 5px 30px; }
        .galeri-card { background: #ffffff; border: 1px solid #e2f3e8; border-radius: 14px; box-shadow: 0 4px 15px rgba(25,135,84,0.07); overflow: hidden; }
        .galeri-card-body { padding: 25px; }
        .form-label { color: #198754; font-weight: 600; margin-bottom: 8px; }
        .form-control, .form-select { border: 1px solid #d7ecdd; border-radius: 8px; padding: 11px 13px; }
        .form-control:focus, .form-select:focus { border-color: #198754; box-shadow: 0 0 0 0.2rem rgba(25,135,84,0.15); }
        .file-info { color: #6c757d; font-size: 13px; margin-top: 7px; line-height: 1.7; }
        .preview-container { margin-top: 15px; padding: 15px; border: 1px dashed #cbd8e6; border-radius: 10px; background: #f8fafc; }
        .preview-container img, .preview-container video { display: block; width: 100%; max-width: 550px; max-height: 350px; border-radius: 8px; margin-top: 10px; }
        .preview-container img { object-fit: contain; }
        .galeri-actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 25px; padding-top: 20px; border-top: 1px solid #e2f3e8; }
        .btn-simpan { background: #198754; color: #ffffff; border: none; border-radius: 8px; padding: 10px 20px; font-weight: 600; }
        .btn-simpan:hover { background: #157347; color: #ffffff; }
        .btn-kembali { background: #eef7f2; color: #198754; border-radius: 8px; padding: 10px 20px; font-weight: 600; text-decoration: none; }
        .btn-kembali:hover { background: #dfeee6; color: #198754; }

        @media (max-width: 576px) {
            .galeri-card-body { padding: 18px; }
            .galeri-actions { flex-direction: column; }
            .galeri-actions .btn, .galeri-actions a { text-align: center; width: 100%; }
        }
    </style>
</head>

<body class="sb-nav-fixed">

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
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Data Sekolah</div>
                        <a class="nav-link" href="{{ url('/profil-sekolah') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>Profil Sekolah
                        </a>
                        <a class="nav-link" href="{{ url('/siswa') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>Data Siswa
                        </a>
                        <a class="nav-link" href="{{ url('/dashboard/guru') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>Data Guru
                        </a>
                        <a class="nav-link" href="{{ url('/dashboard/berita') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>Berita
                        </a>
                        <a class="nav-link active" href="{{ url('/dashboard/galeri') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>Galeri
                        </a>
                        <a class="nav-link" href="{{ url('/dashboard/ekstrakulikuler') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-futbol"></i></div>Ekstrakulikuler
                        </a>
                        @if(auth()->user()->role === 'Admin')
                            <div class="sb-sidenav-menu-heading">Management User</div>
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>Management User
                            </a>
                        @endif
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login sebagai:</div>
                    {{ auth()->user()->role }}
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <h1 class="mt-4">Edit Galeri</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>

                    <div class="galeri-wrapper">
                        <div class="galeri-card">
                            <div class="galeri-card-body">

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

                                <form action="{{ route('galeri.update') }}"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="galeri_id" value="{{ $galeri->getKey() }}">

                                    <div class="row">

                                        {{-- JUDUL --}}
                                        <div class="col-md-12 mb-3">
                                            <label for="judul" class="form-label">Judul Galeri</label>
                                            <input type="text" name="judul" id="judul"
                                                   class="form-control @error('judul') is-invalid @enderror"
                                                   value="{{ old('judul', $galeri->judul) }}"
                                                   placeholder="Contoh: Kegiatan P5" required>
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- KETERANGAN --}}
                                        <div class="col-12 mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" rows="4"
                                                      class="form-control @error('keterangan') is-invalid @enderror"
                                                      placeholder="Tuliskan keterangan kegiatan...">{{ old('keterangan', $galeri->deskripsi) }}</textarea>
                                            @error('keterangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- FOTO / VIDEO --}}
                                        <div class="col-12 mb-3">
                                            <label for="file" class="form-label">Foto / Video (Opsional)</label>
                                            <input type="file" name="file" id="file"
                                                   class="form-control @error('file') is-invalid @enderror"
                                                   accept=".jpg,.jpeg,.png,.webp,.mp4,.webm,.ogg,.mov,.avi,.mkv">
                                            <div class="file-info">
                                                Format: JPG, PNG, WEBP, MP4, WEBM, OGG, MOV, AVI, MKV.<br>
                                                Maks 50 MB. Kosongkan kalau tidak ingin ganti.
                                            </div>
                                            @error('file')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- PREVIEW FOTO LAMA --}}
                                        @if($galeri->gambar)
                                            <div class="col-12" id="previewFotoLama">
                                                <div class="preview-container">
                                                    <strong>Foto Saat Ini</strong>
                                                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Foto Galeri">
                                                </div>
                                            </div>
                                        @endif

                                        {{-- PREVIEW VIDEO LAMA (FILE) --}}
                                        @if($galeri->video && !\Illuminate\Support\Str::startsWith($galeri->video, 'http'))
                                            <div class="col-12" id="previewVideoLama">
                                                <div class="preview-container">
                                                    <strong>Video Saat Ini</strong>
                                                    <video controls>
                                                        <source src="{{ asset('storage/' . $galeri->video) }}" type="video/mp4">
                                                        Browser kamu tidak mendukung pemutaran video.
                                                    </video>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- PREVIEW YOUTUBE LAMA --}}
                                        @if($galeri->video && \Illuminate\Support\Str::startsWith($galeri->video, 'http'))
                                            <div class="col-12" id="previewYoutubeLama">
                                                <div class="preview-container">
                                                    <strong>Video YouTube Saat Ini</strong>
                                                    @php
                                                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $galeri->video, $yt);
                                                        $youtubeId = $yt[1] ?? '';
                                                    @endphp
                                                    @if($youtubeId)
                                                        <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                                frameborder="0"
                                                                allowfullscreen
                                                                style="width:100%;max-width:550px;aspect-ratio:16/9;border-radius:8px;">
                                                        </iframe>
                                                    @else
                                                        <p>{{ $galeri->video }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        {{-- PREVIEW FILE BARU --}}
                                        <div class="col-12" id="previewBaru" style="display:none;">
                                            <div class="preview-container">
                                                <strong>Preview File Baru</strong>
                                                <img id="gambarPreview" src="" alt="Preview" style="display:none;">
                                                <video id="videoPreview" controls style="display:none;">
                                                    Browser kamu tidak mendukung pemutaran video.
                                                </video>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="galeri-actions">
                                        <a href="{{ route('galeri.index') }}" class="btn-kembali">Batal</a>
                                        <button type="submit" class="btn btn-simpan">Update Galeri</button>
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
            const fileInput = document.getElementById('file');
            const previewBaru = document.getElementById('previewBaru');
            const gambarPreview = document.getElementById('gambarPreview');
            const videoPreview = document.getElementById('videoPreview');
            const previewFotoLama = document.getElementById('previewFotoLama');
            const previewVideoLama = document.getElementById('previewVideoLama');
            const previewYoutubeLama = document.getElementById('previewYoutubeLama');

            fileInput.addEventListener('change', function () {
                const file = this.files[0];

                if (!file) {
                    previewBaru.style.display = 'none';
                    if (previewFotoLama) previewFotoLama.style.display = 'block';
                    if (previewVideoLama) previewVideoLama.style.display = 'block';
                    if (previewYoutubeLama) previewYoutubeLama.style.display = 'block';
                    return;
                }

                previewBaru.style.display = 'block';
                if (previewFotoLama) previewFotoLama.style.display = 'none';
                if (previewVideoLama) previewVideoLama.style.display = 'none';
                if (previewYoutubeLama) previewYoutubeLama.style.display = 'none';

                const url = URL.createObjectURL(file);

                if (file.type.startsWith('image/')) {
                    gambarPreview.src = url;
                    gambarPreview.style.display = 'block';
                    videoPreview.style.display = 'none';
                    videoPreview.removeAttribute('src');
                } else if (file.type.startsWith('video/')) {
                    videoPreview.src = url;
                    videoPreview.style.display = 'block';
                    gambarPreview.style.display = 'none';
                    gambarPreview.removeAttribute('src');
                }
            });
        });
    </script>

</body>
</html>