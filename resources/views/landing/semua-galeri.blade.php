<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Galeri - {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: Arial, sans-serif; background: #f8f9fa; }
        .navbar { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .navbar-brand { font-weight: bold; color: #198754 !important; display: flex; align-items: center; gap: 10px; }
        .navbar-brand img { width: 38px; height: 38px; object-fit: contain; }
        .navbar-brand small { display: block; font-size: 12px; color: #777; font-weight: normal; }
        .nav-link { font-weight: 500; color: #333 !important; }
        .nav-link:hover { color: #198754 !important; }
        .page-header { background: #198754; color: white; padding: 60px 0; text-align: center; }
        .section { padding: 50px 0; }
        .section-title { text-align: center; margin-bottom: 35px; }
        .section-title h2 { font-weight: bold; color: #198754; }
        .section-title p { color: #777; }
        .card-custom { height: 100%; border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: transform 0.2s; }
        .card-custom:hover { transform: translateY(-5px); }
        .card-custom img { width: 100%; height: 220px; object-fit: cover; }
        .media-220 { width: 100%; height: 220px; border: 0; display: block; }
        .galeri-isi { color: #555; line-height: 1.7; }
        footer { background: #198754; color: white; padding: 55px 0 0; }
        footer h4, footer h5 { color: white; font-weight: bold; }
        footer p { color: white; line-height: 1.7; }
        footer small { color: rgba(255,255,255,0.85); }
        footer a { color: white; text-decoration: none; }
        footer a:hover { color: #d1e7dd; }
        .footer-logo { width: 55px; height: 55px; object-fit: contain; background: white; border-radius: 8px; padding: 5px; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.3); margin-top: 40px; padding: 18px 0; }
        @media (max-width: 768px) {
            .navbar-brand img { width: 35px; height: 35px; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            @if($profil && $profil->logo)
                <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah">
            @endif
            <span>
                {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}
                <small>Bekasi Timur</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#profil">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#guru">Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#siswa">Siswa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.berita') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#galeri">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#ekstrakulikuler">Ekstrakulikuler</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="page-header">
    <div class="container">
        <h1 class="fw-bold">Semua Galeri</h1>
        <p class="mb-0">Dokumentasi kegiatan {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</p>
    </div>
</header>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Galeri Kegiatan Sekolah</h2>
            <p>Berikut adalah dokumentasi kegiatan sekolah kami.</p>
        </div>

        <div class="row g-4">
            @forelse($galeris as $galeri)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom">

                        {{-- 1. FOTO --}}
                        @if($galeri->gambar)
                            <img
                                src="{{ asset('storage/' . $galeri->gambar) }}"
                                alt="{{ $galeri->judul }}"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <div class="align-items-center justify-content-center bg-secondary text-white" style="height:220px; display:none;">
                                <i class="fas fa-image fa-4x"></i>
                            </div>

                        {{-- 2. YOUTUBE --}}
                        @elseif($galeri->video && \Illuminate\Support\Str::startsWith($galeri->video, ['http://', 'https://']))
                            @php
                                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $galeri->video, $yt);
                                $youtubeId = $yt[1] ?? '';
                            @endphp
                            @if($youtubeId)
                                <iframe
                                    class="media-220"
                                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                    title="{{ $galeri->judul }}"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-secondary text-white" style="height:220px;">
                                    <i class="fas fa-video fa-4x"></i>
                                </div>
                            @endif

                        {{-- 3. FILE VIDEO --}}
                        @elseif($galeri->video)
                            <video class="media-220" controls>
                                <source src="{{ asset('storage/' . $galeri->video) }}" type="video/mp4">
                                Browser kamu tidak mendukung pemutaran video.
                            </video>

                        {{-- 4. PLACEHOLDER --}}
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary text-white" style="height:220px;">
                                <i class="fas fa-image fa-4x"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold">{{ $galeri->judul }}</h5>

                            @if($galeri->deskripsi)
                                <p class="galeri-isi mt-2">{{ \Illuminate\Support\Str::limit(strip_tags($galeri->deskripsi), 120) }}</p>
                            @endif

                            <div class="mt-auto">
                                <form action="{{ route('galeri.landing-detail') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="galeri_id" value="{{ $galeri->getKey() }}">
                                    <button type="submit" class="btn btn-success btn-sm mt-2">
                                        <i class="fas fa-eye me-1"></i> Lihat Detail
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center">
                        Belum ada data galeri yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('/') }}#galeri" class="btn btn-success">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Landing Page
            </a>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    @if($profil && $profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo" class="footer-logo">
                    @endif
                    <div class="ms-3">
                        <h4 class="mb-1">{{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</h4>
                        <small>Bekasi Timur</small>
                    </div>
                </div>
                <p class="mb-3">Selamat datang di website resmi {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}.</p>
            </div>

            <div class="col-lg-2 col-md-6">
                <h5 class="mb-3">Menu Cepat</h5>
                <p class="mb-2"><a href="{{ url('/') }}"><i class="fas fa-angle-right me-2"></i>Beranda</a></p>
                <p class="mb-2"><a href="{{ url('/') }}#profil"><i class="fas fa-angle-right me-2"></i>Profil</a></p>
                <p class="mb-2"><a href="{{ url('/') }}#guru"><i class="fas fa-angle-right me-2"></i>Guru</a></p>
                <p class="mb-2"><a href="{{ route('landing.berita') }}"><i class="fas fa-angle-right me-2"></i>Berita</a></p>
                <p class="mb-2"><a href="{{ url('/') }}#galeri"><i class="fas fa-angle-right me-2"></i>Galeri</a></p>
                <p class="mb-2"><a href="{{ url('/') }}#ekstrakulikuler"><i class="fas fa-angle-right me-2"></i>Ekstrakulikuler</a></p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Kontak Sekolah</h5>
                <p class="mb-2"><i class="fas fa-location-dot me-2"></i>{{ $profil->alamat ?? '-' }}</p>
                <p class="mb-2"><i class="fas fa-phone me-2"></i>{{ $profil->telp ?? ($profil->kontak ?? '-') }}</p>
                <p class="mb-2"><i class="fas fa-envelope me-2"></i>{{ $profil->email ?? '-' }}</p>
                <p class="mb-2"><i class="fas fa-globe me-2"></i>{{ $profil->website ?? '-' }}</p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Informasi</h5>
                <p class="mb-2"><strong>Nama Yayasan</strong><br>{{ $profil->nama_yayasan ?? '-' }}</p>
                <p class="mb-2"><strong>Kepala Sekolah</strong><br>{{ $profil->kepala_sekolah ?? '-' }}</p>
                <p class="mb-0"><strong>NPSN</strong><br>{{ $profil->npsn ?? '-' }}</p>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <small>&copy; {{ date('Y') }} {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</small>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small>Bekasi Timur</small>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>