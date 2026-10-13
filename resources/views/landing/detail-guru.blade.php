<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Guru - MI Nurul Anwar</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f8f9fa; }
        .navbar-landing { background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 12px 0; }
        .navbar-brand { display: flex; align-items: center; text-decoration: none; color: #198754; font-weight: bold; }
        .navbar-brand img { width: 45px; height: 45px; object-fit: contain; margin-right: 10px; }
        .navbar-brand-text { line-height: 1.2; }
        .navbar-brand-text .school-name { font-size: 18px; color: #198754; }
        .navbar-brand-text .school-location { font-size: 12px; color: #6c757d; font-weight: normal; }
        .nav-link { color: #333 !important; font-weight: 500; margin-left: 12px; }
        .nav-link:hover { color: #198754 !important; }
        .detail-section { padding: 70px 0; min-height: 600px; }
        .detail-title { color: #198754; font-weight: bold; margin-bottom: 35px; }
        .guru-detail-card { background: white; border-radius: 15px; box-shadow: 0 4px 18px rgba(0,0,0,0.08); padding: 35px; }
        .guru-photo { width: 220px; height: 260px; object-fit: cover; border-radius: 12px; border: 4px solid #198754; }
        .guru-photo-placeholder { width: 220px; height: 260px; border-radius: 12px; background: #e9ecef; display: flex; align-items: center; justify-content: center; color: #6c757d; font-size: 70px; border: 4px solid #198754; }
        .guru-name { color: #198754; font-weight: bold; font-size: 28px; margin-bottom: 25px; }
        .detail-row { padding: 10px 0; border-bottom: 1px solid #eee; }
        .detail-label { font-weight: bold; color: #555; }
        .detail-value { color: #333; }
        .footer-landing { background: #198754; color: white; padding: 50px 0 20px; }
        .footer-landing h5 { font-weight: bold; margin-bottom: 18px; }
        .footer-landing p { margin-bottom: 8px; }
        .footer-landing a { color: white; text-decoration: none; }
        .footer-landing a:hover { text-decoration: underline; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.25); margin-top: 30px; padding-top: 20px; text-align: center; }
        @media (max-width: 768px) {
            .guru-detail-card { padding: 20px; }
            .guru-photo, .guru-photo-placeholder { width: 180px; height: 220px; margin-bottom: 25px; }
            .guru-name { font-size: 23px; }
            .nav-link { margin-left: 0; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-landing">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            @if($profil && $profil->logo)
                <img src="{{ asset('storage/profil/' . $profil->logo) }}" alt="Logo Sekolah">
            @endif
            <div class="navbar-brand-text">
                <div class="school-name">MI Nurul Anwar</div>
                <div class="school-location">Bekasi Timur</div>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLanding">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarLanding">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('landing.semua-guru') }}">Guru</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/berita') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/ekstrakulikuler') }}">Ekstrakulikuler</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="detail-section">
    <div class="container">
        <h2 class="text-center detail-title">Detail Guru</h2>

        <div class="guru-detail-card">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    @if($guru->foto)
                        <img src="{{ asset('storage/guru/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" class="guru-photo">
                    @else
                        <div class="guru-photo-placeholder mx-auto"><i class="fas fa-user"></i></div>
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="guru-name">{{ $guru->nama_guru }}</div>

                    <div class="detail-row row">
                        <div class="col-sm-4 detail-label">NIP</div>
                        <div class="col-sm-8 detail-value">{{ $guru->nip }}</div>
                    </div>
                    <div class="detail-row row">
                        <div class="col-sm-4 detail-label">Nama Guru</div>
                        <div class="col-sm-8 detail-value">{{ $guru->nama_guru }}</div>
                    </div>
                    <div class="detail-row row">
                        <div class="col-sm-4 detail-label">Jenis Kelamin</div>
                        <div class="col-sm-8 detail-value">{{ $guru->jenis_kelamin }}</div>
                    </div>
                    <div class="detail-row row">
                        <div class="col-sm-4 detail-label">Mata Pelajaran</div>
                        <div class="col-sm-8 detail-value">{{ $guru->mata_pelajaran }}</div>
                    </div>
                    <div class="detail-row row">
                        <div class="col-sm-4 detail-label">No. HP</div>
                        <div class="col-sm-8 detail-value">{{ $guru->no_hp ?: '-' }}</div>
                    </div>
                    <div class="detail-row row">
                        <div class="col-sm-4 detail-label">Alamat</div>
                        <div class="col-sm-8 detail-value">{{ $guru->alamat ?: '-' }}</div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('landing.semua-guru') }}" class="btn btn-success">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer-landing">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-4">
                <div class="d-flex align-items-center mb-3">
                    @if($profil && $profil->logo)
                        <img src="{{ asset('storage/profil/' . $profil->logo) }}" alt="Logo Sekolah" style="width:55px;height:55px;object-fit:contain;margin-right:12px;">
                    @endif
                    <div>
                        <h5 class="mb-0">MI Nurul Anwar</h5>
                        <small>Bekasi Timur</small>
                    </div>
                </div>
                <p>Website resmi MI Nurul Anwar sebagai media informasi sekolah kepada siswa, orang tua, guru, dan masyarakat.</p>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Menu</h5>
                <p><a href="{{ url('/') }}">Beranda</a></p>
                <p><a href="{{ url('/profil') }}">Profil</a></p>
                <p><a href="{{ route('landing.semua-guru') }}">Guru</a></p>
                <p><a href="{{ url('/berita') }}">Berita</a></p>
                <p><a href="{{ url('/galeri') }}">Galeri</a></p>
                <p><a href="{{ url('/ekstrakulikuler') }}">Ekstrakulikuler</a></p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Kontak Sekolah</h5>
                @if($profil)
                    <p><i class="fas fa-location-dot me-2"></i>{{ $profil->alamat ?: '-' }}</p>
                    <p><i class="fas fa-phone me-2"></i>{{ $profil->telp ?: ($profil->kontak ?: '-') }}</p>
                    <p><i class="fas fa-envelope me-2"></i>{{ $profil->email ?: '-' }}</p>
                @else
                    <p>Alamat sekolah belum tersedia.</p>
                @endif
            </div>
        </div>
        <div class="footer-bottom">
            <p class="mb-0">&copy; {{ date('Y') }} MI Nurul Anwar. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>