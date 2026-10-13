<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $berita->judul }} - {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8f9fa;
        }

        .navbar-landing {
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 12px 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #198754;
            font-weight: bold;
        }

        .navbar-brand img {
            width: 45px;
            height: 45px;
            object-fit: contain;
            margin-right: 10px;
        }

        .navbar-brand-text {
            line-height: 1.2;
        }

        .navbar-brand-text .school-name {
            font-size: 18px;
            color: #198754;
        }

        .navbar-brand-text .school-location {
            font-size: 12px;
            color: #6c757d;
            font-weight: normal;
        }

        .nav-link {
            font-weight: 500;
            color: #333 !important;
        }

        .nav-link:hover {
            color: #198754 !important;
        }

        .detail-section {
            padding: 80px 0;
            min-height: 650px;
        }

        .detail-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .detail-image {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 15px;
        }

        .detail-title {
            color: #198754;
            font-weight: bold;
        }

        .detail-date {
            color: #777;
            font-size: 15px;
            margin-bottom: 25px;
        }

        .detail-content {
            color: #666;
            line-height: 1.8;
            text-align: justify;
            white-space: pre-line;
        }

        footer {
            background: #198754;
            color: white;
            padding: 55px 0 0;
        }

        footer h4,
        footer h5 {
            color: white;
            font-weight: bold;
        }

        footer p {
            color: white;
            line-height: 1.7;
        }

        footer small {
            color: rgba(255, 255, 255, 0.85);
        }

        .footer-logo {
            width: 55px;
            height: 55px;
            object-fit: contain;
            background: white;
            border-radius: 8px;
            padding: 5px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            margin-top: 40px;
            padding: 18px 0;
        }

        @media (max-width: 768px) {
            .detail-section {
                padding: 50px 0;
            }

            .detail-card {
                padding: 25px;
            }

            .detail-image {
                max-height: 350px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-landing">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            @if($profil && $profil->logo)
                <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah">
            @endif
            <div class="navbar-brand-text">
                <div class="school-name">
                    {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}
                </div>
                <div class="school-location">
                    Bekasi Timur
                </div>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLanding">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarLanding">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#guru">Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#ekstrakulikuler">Ekstrakulikuler</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- DETAIL BERITA -->
<section class="detail-section">
    <div class="container">

        <div class="detail-card">

            <div class="row align-items-center g-5">

                <!-- FOTO BERITA -->
                <div class="col-lg-6">

                    @if($berita->foto)

                        <img src="{{ asset('storage/berita/' . $berita->foto) }}"
                             alt="{{ $berita->judul }}"
                             class="detail-image">

                    @else

                        <div class="d-flex align-items-center justify-content-center bg-secondary"
                             style="height:400px; border-radius:15px;">

                            <i class="fas fa-newspaper fa-6x text-white"></i>

                        </div>

                    @endif

                </div>

                <!-- INFORMASI BERITA -->
                <div class="col-lg-6">

                    <h1 class="detail-title mb-3">
                        {{ $berita->judul }}
                    </h1>

                    <div class="detail-date">
                        <i class="fas fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                    </div>

                    <p class="detail-content">
                        {{ $berita->isi }}
                    </p>

                    <a href="{{ url('/berita') }}"
                       class="btn btn-success mt-3">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali ke Berita

                    </a>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- FOOTER -->
<footer>

    <div class="container">

        <div class="row g-4">

            <!-- IDENTITAS SEKOLAH -->
            <div class="col-lg-5">

                <div class="d-flex align-items-center mb-3">

                    @if($profil && $profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" style="width:55px;height:55px;object-fit:contain;margin-right:12px;">
                    @endif
                    <div class="ms-3">

                        <h4 class="mb-1">
                            {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}
                        </h4>

                        <small>
                            Bekasi Timur
                        </small>

                    </div>

                </div>

                <p>
                    Selamat datang di website resmi
                    {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}.
                    Temukan informasi sekolah, guru, berita,
                    galeri, dan berbagai kegiatan sekolah.
                </p>

            </div>

            <!-- KONTAK -->
            <div class="col-lg-4">

                <h5 class="mb-3">
                    Kontak Sekolah
                </h5>

                <p class="mb-2">
                    <i class="fas fa-location-dot me-2"></i>
                    {{ $profil->alamat ?? 'Alamat sekolah belum tersedia' }}
                </p>

                <p class="mb-2">
                    <i class="fas fa-phone me-2"></i>
                    {{ $profil->telp ?? $profil->kontak ?? 'Nomor telepon belum tersedia' }}
                </p>

                <p class="mb-2">
                    <i class="fas fa-envelope me-2"></i>
                    {{ $profil->email ?? 'Email belum tersedia' }}
                </p>

                <p class="mb-2">
                    <i class="fas fa-globe me-2"></i>
                    {{ $profil->website ?? 'Website belum tersedia' }}
                </p>

            </div>

            <!-- INFORMASI -->
            <div class="col-lg-3">

                <h5 class="mb-3">
                    Informasi
                </h5>

                <p class="mb-2">
                    <strong>Nama Yayasan</strong>
                    <br>
                    {{ $profil->nama_yayasan ?? '-' }}
                </p>

                <p class="mb-2">
                    <strong>Kepala Sekolah</strong>
                    <br>
                    {{ $profil->kepala_sekolah ?? '-' }}
                </p>

                <p class="mb-0">
                    <strong>NPSN</strong>
                    <br>
                    {{ $profil->npsn ?? '-' }}
                </p>

            </div>

        </div>

        <!-- FOOTER BOTTOM -->
        <div class="footer-bottom">

            <div class="row">

                <div class="col-md-6 text-center text-md-start">

                    <small>
                        © {{ date('Y') }}
                        {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}
                    </small>

                </div>

                <div class="col-md-6 text-center text-md-end">

                    <small>
                        Bekasi Timur
                    </small>

                </div>

            </div>

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>