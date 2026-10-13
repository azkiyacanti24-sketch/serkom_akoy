<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Galeri - MI Nurul Anwar</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        /* ==== STYLE SIDEBAR & NAVBAR (hijau) ==== */
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

        /* ==== STYLE GALERI (mirip file ke-1, warna hijau) ==== */
        .galeri-wrapper {
            width: 100%;
            padding: 10px 5px 30px;
        }

        .galeri-card {
            background: #ffffff;
            border: 1px solid #e2f3e8;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.07);
            overflow: hidden;
        }

        .galeri-card-body {
            padding: 25px;
        }

        .form-label {
            color: #198754;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border: 1px solid #d7ecdd;
            border-radius: 8px;
            padding: 11px 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.15);
        }

        .file-info {
            color: #6c757d;
            font-size: 13px;
            margin-top: 7px;
            line-height: 1.7;
        }

        .preview-container {
            margin-top: 15px;
            padding: 15px;
            border: 1px dashed #cbd8e6;
            border-radius: 10px;
            background: #f8fafc;
        }

        .preview-container img,
        .preview-container video,
        .preview-container iframe {
            display: block;
            width: 100%;
            max-width: 550px;
            max-height: 350px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .preview-container img {
            object-fit: contain;
        }

        .preview-container iframe {
            aspect-ratio: 16 / 9;
            height: auto;
            border: 0;
        }

        .galeri-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2f3e8;
        }

        .btn-simpan {
            background: #198754;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-simpan:hover {
            background: #157347;
            color: #ffffff;
        }

        .btn-kembali {
            background: #eef7f2;
            color: #198754;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-kembali:hover {
            background: #dfeee6;
            color: #198754;
        }

        @media (max-width: 576px) {
            .galeri-card-body {
                padding: 18px;
            }

            .galeri-actions {
                flex-direction: column;
            }

            .galeri-actions .btn,
            .galeri-actions a {
                text-align: center;
                width: 100%;
            }
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

    <!-- LAYOUT -->
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

                        <a class="nav-link" href="{{ url('/dashboard/guru') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Data Guru
                        </a>

                        <a class="nav-link" href="{{ route('berita.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                            Berita
                        </a>

                        <a class="nav-link active" href="{{ route('galeri.index') }}">
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

                    <h1 class="mt-4">Tambah Galeri</h1>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>

                    <div class="galeri-wrapper">
                        <div class="galeri-card">
                            <div class="galeri-card-body">

                                {{-- PESAN ERROR --}}
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

                                <form action="{{ route('galeri.store') }}"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    @csrf

                                    <div class="row">

                                        {{-- JUDUL GALERI --}}
                                        <div class="col-md-8 mb-3">
                                            <label for="judul" class="form-label">Judul Galeri</label>
                                            <input type="text" name="judul" id="judul"
                                                   class="form-control @error('judul') is-invalid @enderror"
                                                   value="{{ old('judul') }}"
                                                   placeholder="Contoh: Pencegahan Perundungan (Bullying)"
                                                   maxlength="50" required>
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- TANGGAL KEGIATAN --}}
                                        <div class="col-md-4 mb-3">
                                            <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
                                            <input type="date" name="tanggal" id="tanggal"
                                                   class="form-control @error('tanggal') is-invalid @enderror"
                                                   value="{{ old('tanggal', date('Y-m-d')) }}" required>
                                            @error('tanggal')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- KATEGORI GALERI --}}
                                        <div class="col-md-6 mb-3">
                                            <label for="kategori" class="form-label">Kategori Galeri</label>
                                            <select name="kategori" id="kategori"
                                                    class="form-select @error('kategori') is-invalid @enderror" required>
                                                <option value="">-- Pilih Kategori --</option>
                                                <option value="Foto" {{ old('kategori') == 'Foto' ? 'selected' : '' }}>Foto</option>
                                                <option value="Video" {{ old('kategori') == 'Video' ? 'selected' : '' }}>Video</option>
                                            </select>
                                            @error('kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- JENIS VIDEO --}}
                                        <div class="col-md-6 mb-3" id="sumberVideoWrapper" style="display: none;">
                                            <label for="sumber_video" class="form-label">Jenis Video</label>
                                            <select name="sumber_video" id="sumber_video"
                                                    class="form-select @error('sumber_video') is-invalid @enderror">
                                                <option value="">-- Pilih Jenis Video --</option>
                                                <option value="file" {{ old('sumber_video', 'file') == 'file' ? 'selected' : '' }}>Upload File Video</option>
                                                <option value="link" {{ old('sumber_video') == 'link' ? 'selected' : '' }}>Link YouTube</option>
                                            </select>
                                            @error('sumber_video')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- INPUT FILE FOTO / VIDEO --}}
                                        <div class="col-md-6 mb-3" id="fileWrapper" style="display: none;">
                                            <label for="file" class="form-label" id="labelFile">Pilih File</label>
                                            <input type="file" name="file" id="file"
                                                   class="form-control @error('file') is-invalid @enderror"
                                                   accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi,.mkv">
                                            <div class="file-info" id="fileInfo">
                                                Pilih file sesuai kategori.
                                                Ukuran maksimal 20 MB.
                                            </div>
                                            @error('file')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- INPUT LINK YOUTUBE --}}
                                        <div class="col-md-6 mb-3" id="linkVideoWrapper" style="display: none;">
                                            <label for="link_video" class="form-label">Link Video YouTube</label>
                                            <input type="url" name="link_video" id="link_video"
                                                   class="form-control @error('link_video') is-invalid @enderror"
                                                   value="{{ old('link_video') }}"
                                                   placeholder="https://www.youtube.com/watch?v=..." disabled>
                                            <div class="file-info">
                                                Tempel link video YouTube yang ingin ditampilkan.
                                            </div>
                                            @error('link_video')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- PREVIEW FOTO --}}
                                        <div class="col-12" id="previewFoto" style="display: none;">
                                            <div class="preview-container">
                                                <strong>Preview Foto</strong>
                                                <img id="gambarPreview" src="" alt="Preview foto yang dipilih">
                                            </div>
                                        </div>

                                        {{-- PREVIEW FILE VIDEO --}}
                                        <div class="col-12" id="previewVideo" style="display: none;">
                                            <div class="preview-container">
                                                <strong>Preview Video</strong>
                                                <video id="videoPreview" controls>
                                                    Browser kamu tidak mendukung pemutaran video.
                                                </video>
                                            </div>
                                        </div>

                                        {{-- PREVIEW YOUTUBE --}}
                                        <div class="col-12" id="previewLinkVideo" style="display: none;">
                                            <div class="preview-container">
                                                <strong>Preview Video YouTube</strong>
                                                <iframe id="youtubePreview" src=""
                                                        title="Preview video YouTube"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        referrerpolicy="strict-origin-when-cross-origin"
                                                        allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>

                                        {{-- KETERANGAN --}}
                                        <div class="col-12 mt-3 mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" rows="4"
                                                      class="form-control @error('keterangan') is-invalid @enderror"
                                                      placeholder="Tuliskan keterangan kegiatan atau isi galeri..."
                                                      required>{{ old('keterangan') }}</textarea>
                                            @error('keterangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    {{-- TOMBOL --}}
                                    <div class="galeri-actions">
                                        <a href="{{ route('galeri.index') }}" class="btn-kembali">Batal</a>
                                        <button type="submit" class="btn btn-simpan">Simpan Galeri</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <!-- FOOTER -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MI Nurul Anwar 2026</div>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kategori = document.getElementById('kategori');
            const sumberVideo = document.getElementById('sumber_video');

            const sumberWrapper = document.getElementById('sumberVideoWrapper');
            const fileWrapper = document.getElementById('fileWrapper');
            const linkWrapper = document.getElementById('linkVideoWrapper');

            const fileInput = document.getElementById('file');
            const fileInfo = document.getElementById('fileInfo');
            const labelFile = document.getElementById('labelFile');
            const linkInput = document.getElementById('link_video');

            const previewFoto = document.getElementById('previewFoto');
            const gambarPreview = document.getElementById('gambarPreview');

            const previewVideo = document.getElementById('previewVideo');
            const videoPreview = document.getElementById('videoPreview');

            const previewLinkVideo = document.getElementById('previewLinkVideo');
            const youtubePreview = document.getElementById('youtubePreview');

            let previewUrl = null;

            function bersihkanPreview() {
                previewFoto.style.display = 'none';
                previewVideo.style.display = 'none';
                previewLinkVideo.style.display = 'none';

                gambarPreview.removeAttribute('src');

                videoPreview.pause();
                videoPreview.removeAttribute('src');
                videoPreview.load();

                youtubePreview.removeAttribute('src');

                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                    previewUrl = null;
                }
            }

            function youtubeEmbedUrl(url) {
                try {
                    const parsed = new URL(url);
                    let id = '';

                    if (parsed.hostname === 'youtu.be' || parsed.hostname.endsWith('.youtu.be')) {
                        id = parsed.pathname.split('/').filter(Boolean)[0] || '';
                    } else if (parsed.hostname === 'youtube.com' || parsed.hostname.endsWith('.youtube.com')) {
                        if (parsed.pathname === '/watch') {
                            id = parsed.searchParams.get('v') || '';
                        } else {
                            const parts = parsed.pathname.split('/').filter(Boolean);
                            if (['embed', 'shorts', 'live'].includes(parts[0])) {
                                id = parts[1] || '';
                            }
                        }
                    }

                    if (!/^[a-zA-Z0-9_-]{11}$/.test(id)) return '';

                    return 'https://www.youtube.com/embed/' + id;
                } catch (error) {
                    return '';
                }
            }

            function tampilkanPreview() {
                bersihkanPreview();
                const file = fileInput.files[0];
                if (!file || fileInput.disabled) return;

                previewUrl = URL.createObjectURL(file);

                if (kategori.value === 'Foto' && file.type.startsWith('image/')) {
                    gambarPreview.src = previewUrl;
                    previewFoto.style.display = 'block';
                } else if (kategori.value === 'Video' && file.type.startsWith('video/')) {
                    videoPreview.src = previewUrl;
                    previewVideo.style.display = 'block';
                }
            }

            function tampilkanPreviewLink() {
                bersihkanPreview();
                if (kategori.value !== 'Video' || sumberVideo.value !== 'link') return;

                const embedUrl = youtubeEmbedUrl(linkInput.value.trim());

                if (embedUrl) {
                    youtubePreview.src = embedUrl;
                    previewLinkVideo.style.display = 'block';
                }
            }

            function aturForm() {
                const isFoto = kategori.value === 'Foto';
                const isVideo = kategori.value === 'Video';
                const pakaiLink = isVideo && sumberVideo.value === 'link';
                const pakaiFile = isFoto || (isVideo && sumberVideo.value === 'file');

                sumberWrapper.style.display = isVideo ? 'block' : 'none';
                fileWrapper.style.display = pakaiFile ? 'block' : 'none';
                linkWrapper.style.display = pakaiLink ? 'block' : 'none';

                fileInput.disabled = !pakaiFile;
                fileInput.required = pakaiFile;

                linkInput.disabled = !pakaiLink;
                linkInput.required = pakaiLink;

                if (isFoto) {
                    labelFile.textContent = 'Pilih Foto';
                    fileInput.accept = '.jpg,.jpeg,.png,.webp';
                    fileInfo.innerHTML = 'Format: JPG, JPEG, PNG, WEBP.<br>Ukuran maksimal: 20 MB.';
                } else {
                    labelFile.textContent = 'Pilih File Video';
                    fileInput.accept = '.mp4,.mov,.avi,.mkv';
                    fileInfo.innerHTML = 'Format: MP4, MOV, AVI, MKV.<br>Ukuran maksimal: 20 MB.';
                }

                bersihkanPreview();

                if (pakaiLink) {
                    tampilkanPreviewLink();
                } else if (pakaiFile && fileInput.files.length) {
                    tampilkanPreview();
                }
            }

            kategori.addEventListener('change', function () {
                fileInput.value = '';
                linkInput.value = '';
                if (kategori.value === 'Video') sumberVideo.value = '';
                aturForm();
            });

            sumberVideo.addEventListener('change', function () {
                fileInput.value = '';
                linkInput.value = '';
                aturForm();
            });

            fileInput.addEventListener('change', tampilkanPreview);
            linkInput.addEventListener('input', tampilkanPreviewLink);

            aturForm();
        });
    </script>

</body>
</html>