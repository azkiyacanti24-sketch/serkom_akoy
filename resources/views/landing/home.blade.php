<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        html { scroll-behavior: smooth; scroll-padding-top: 75px; }
        body { background: #f8f9fa; }
        .navbar { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .navbar-brand { font-weight: bold; color: #198754 !important; display: flex; align-items: center; gap: 10px; }
        .navbar-brand img { width: 38px; height: 38px; object-fit: contain; }
        .navbar-brand small { display: block; font-size: 12px; color: #777; font-weight: normal; }
        .nav-link { font-weight: 500; color: #333 !important; }
        .nav-link:hover { color: #198754 !important; }
        .nav-link.profil-saya { font-weight: 600; color: #198754 !important; }
        .nav-link.profil-saya:hover { background: #e8f5e9; border-radius: 8px; }

        .hero { position: relative; min-height: 720px; display: flex; align-items: center; color: white; overflow: hidden; background: #198754; }
        .hero-slide { position: absolute; inset: 0; background-size: cover; background-position: center; opacity: 0; transition: opacity 0.8s ease-in-out; }
        .hero-slide.active { opacity: 1; }
        .hero-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.58); z-index: 1; }
        .hero-content { position: relative; z-index: 2; max-width: 100%; width: 100%; padding: 75px 70px; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .hero-label { color: #ffc107; font-weight: bold; letter-spacing: 2px; font-size: 14px; }
        .hero h1 { font-size: 48px; font-weight: bold; line-height: 1.15; max-width: 700px; margin: 0 auto; }
        .hero p { font-size: 17px; line-height: 1.7; max-width: 600px; margin: 0 auto; }
        .hero-button { display: inline-block; background: #198754; color: white; border: none; padding: 12px 22px; border-radius: 5px; font-weight: bold; text-decoration: none; }
        .hero-button:hover { background: #157347; color: white; }
        .hero-arrow { position: absolute; z-index: 3; top: 50%; transform: translateY(-50%); width: 45px; height: 45px; border: none; border-radius: 50%; background: rgba(255,255,255,0.85); color: #198754; font-size: 18px; cursor: pointer; }
        .hero-arrow:hover { background: white; }
        .hero-prev { left: 20px; }
        .hero-next { right: 20px; }
        .hero-indicators { position: absolute; z-index: 3; bottom: 20px; left: 0; right: 0; display: flex; justify-content: center; gap: 10px; }
        .hero-indicators button { width: 12px; height: 12px; padding: 0; border: none; border-radius: 50%; background: rgba(255,255,255,0.65); cursor: pointer; }
        .hero-indicators button.active { background: #198754; outline: 2px solid white; }

        .section { padding: 80px 0; scroll-margin-top: 75px; }
        .section-title { text-align: center; margin-bottom: 50px; }
        .section-title h2 { font-weight: bold; color: #198754; }
        .section-title p { color: #777; }

        .profile-card { background: white; border-radius: 15px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); }
        .profile-logo { width: 180px; height: 180px; object-fit: contain; border-radius: 10px; }
        .kepala-sekolah { width: 180px; height: 230px; object-fit: cover; border-radius: 10px; }
        .profile-table { margin-bottom: 0; }
        .profile-table td { padding: 7px 5px; vertical-align: top; }
        .profile-table td:first-child { width: 145px; font-weight: bold; color: #444; }
        .profile-description { line-height: 1.8; text-align: justify; color: #666; }

        .visi-misi { background: white; border-radius: 15px; padding: 30px; height: 100%; box-shadow: 0 5px 20px rgba(0,0,0,0.07); }
        .visi-misi h4 { color: #198754; font-weight: bold; margin-bottom: 20px; }

        .card-custom { border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); height: 100%; }
        .card-custom img { width: 100%; height: 220px; object-fit: cover; }

        .gallery-img { width: 100%; height: 230px; object-fit: cover; border-radius: 12px; }
        .gallery-video { width: 100%; height: 230px; object-fit: cover; border-radius: 12px; display: block; border: 0; }

        .table-siswa { margin-bottom: 0; }
        .table-siswa thead { background: #198754; color: white; }
        .table-siswa thead th { border: none; padding: 15px; font-weight: 600; }
        .table-siswa tbody td { padding: 12px 15px; vertical-align: middle; }
        .table-siswa tbody tr:hover { background: #f1f8f4; }
        .badge-kelas { background: #198754; color: white; padding: 6px 12px; border-radius: 20px; font-size: 12px; }

        footer { background: #198754; color: white; padding: 55px 0 0; }
        footer h4, footer h5 { color: white; font-weight: bold; }
        footer p { color: white; line-height: 1.7; }
        footer small { color: rgba(255,255,255,0.85); }
        footer a { color: white; text-decoration: none; }
        footer a:hover { color: #d1e7dd; }
        .footer-logo { width: 55px; height: 55px; object-fit: contain; background: white; border-radius: 8px; padding: 5px; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.3); margin-top: 40px; padding: 18px 0; }

        @media (max-width: 768px) {
            .hero { min-height: 600px; }
            .hero h1 { font-size: 34px; }
            .hero p { font-size: 16px; }
            .hero-content { padding: 60px 45px; }
            .hero-prev { left: 5px; }
            .hero-next { right: 5px; }
            .hero-arrow { width: 34px; height: 34px; font-size: 14px; }
            .section { padding: 55px 0; }
            .profile-card { padding: 25px; }
            .profile-table td:first-child { width: 120px; }
            .navbar-brand img { width: 35px; height: 35px; }
            .table-siswa thead th, .table-siswa tbody td { padding: 8px; font-size: 13px; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
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
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#berita">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#galeri">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#ekstrakulikuler">Ekstrakulikuler</a></li>
                <li class="nav-item">
                <a class="nav-link fw-bold" style="color: #198754 !important;" href="{{ url('/profil-saya') }}">
                    <i class="fas fa-user-circle me-1"></i> Profil Saya
                </a>
            </li>

                {{-- MENU PROFIL SAYA --}}
                <li class="nav-item">
                    @auth
                        <a class="nav-link profil-saya" href="{{ url('/profil-sekolah') }}">
                            <i class="fas fa-user-circle me-1"></i> Profil Saya
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-slide active" style="background-image: url('{{ asset('assets/assets/img/landing1.jpeg') }}');"></div>
    <div class="hero-slide" style="background-image: url('{{ asset('assets/assets/img/landing2.jpeg') }}');"></div>
    <div class="hero-slide" style="background-image: url('{{ asset('assets/assets/img/landing3.jpeg') }}');"></div>
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <span class="hero-label">BELAJAR &amp; BERKARYA</span>
        <h1 class="mt-2">Tempat Tumbuh Bakat dan Prestasi</h1>
        <p class="mt-3">
            Selamat datang di {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}.
            Kami berkomitmen memberikan pendidikan berkualitas
            untuk membangun generasi yang cerdas dan berakhlak mulia.
        </p>
        <a href="#profil" class="hero-button mt-3">
            <i class="fas fa-chevron-right me-2"></i>LIHAT PROFIL
        </a>
    </div>

    <button type="button" class="hero-arrow hero-prev"><i class="fas fa-chevron-left"></i></button>
    <button type="button" class="hero-arrow hero-next"><i class="fas fa-chevron-right"></i></button>

    <div class="hero-indicators">
        <button type="button" class="active"></button>
        <button type="button"></button>
        <button type="button"></button>
    </div>
</section>

<!-- PROFIL -->
<section class="section" id="profil">
    <div class="container">
        <div class="section-title">
            <h2>Profil Sekolah</h2>
            <p>Mengenal lebih dekat {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</p>
        </div>

        @if($profil)
            <div class="profile-card">
                <div class="row align-items-center">
                    <div class="col-lg-3 text-center mb-5 mb-lg-0">
                        @if($profil->logo)
                            <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" class="profile-logo">
                        @else
                            <i class="fas fa-school fa-6x text-secondary"></i>
                        @endif
                        <p class="fw-bold mt-3 mb-0">Logo Sekolah</p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h2 class="fw-bold text-success mb-3">Tentang {{ $profil->nama_sekolah }}</h2>
                        <p class="profile-description">{{ $profil->nama_sekolah }} merupakan salah satu lembaga pendidikan yang berkomitmen dalam memberikan pendidikan yang berkualitas kepada peserta didik.</p>
                        <p class="profile-description">Dalam menjalankan kegiatan pendidikan, sekolah tidak hanya berfokus pada kemampuan akademik, tetapi juga memberikan perhatian terhadap pembentukan karakter, akhlak, kedisiplinan, tanggung jawab, serta sikap sosial peserta didik.</p>

                        <table class="table table-borderless profile-table mt-3">
                            <tr><td>Nama Madrasah</td><td>:</td><td>{{ $profil->nama_sekolah ?? '-' }}</td></tr>
                            <tr><td>NSM</td><td>:</td><td>{{ $profil->nsm ?? '-' }}</td></tr>
                            <tr><td>NPSN</td><td>:</td><td>{{ $profil->npsn ?? '-' }}</td></tr>
                            <tr><td>Alamat</td><td>:</td><td>{{ $profil->alamat ?? '-' }}</td></tr>
                            <tr><td>Telp</td><td>:</td><td>{{ $profil->telp ?? '-' }}</td></tr>
                            <tr><td>Email</td><td>:</td><td>{{ $profil->email ?? '-' }}</td></tr>
                            <tr><td>Website</td><td>:</td><td>{{ $profil->website ?? '-' }}</td></tr>
                            <tr><td>Nama Yayasan</td><td>:</td><td>{{ $profil->nama_yayasan ?? '-' }}</td></tr>
                            <tr><td>Kepala Sekolah</td><td>:</td><td>{{ $profil->kepala_sekolah ?? '-' }}</td></tr>
                        </table>
                    </div>

                    <div class="col-lg-3 text-center">
                        @if($profil->foto)
                            <img src="{{ asset('storage/' . $profil->foto) }}" alt="Kepala Sekolah" class="kepala-sekolah">
                        @else
                            <i class="fas fa-user-tie fa-6x text-secondary"></i>
                        @endif
                        <h6 class="fw-bold mt-3 mb-1">Kepala Sekolah</h6>
                        <p class="text-muted mb-0">{{ $profil->kepala_sekolah ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center">Data profil sekolah belum tersedia.</div>
        @endif
    </div>
</section>

<!-- VISI MISI -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Visi &amp; Misi</h2>
            <p>Visi dan misi {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="visi-misi">
                    <h4><i class="fas fa-eye me-2"></i>Visi</h4>
                    <p>{!! nl2br(e($profil->visi ?? 'Visi sekolah belum tersedia.')) !!}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="visi-misi">
                    <h4><i class="fas fa-bullseye me-2"></i>Misi</h4>
                    <p>{!! nl2br(e($profil->misi ?? 'Misi sekolah belum tersedia.')) !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GURU -->
<section class="section" id="guru">
    <div class="container">
        <div class="section-title">
            <h2>Guru</h2>
            <p>Tenaga pendidik {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</p>
        </div>

        <div class="row g-4">
            @forelse($gurus as $guru)
                <div class="col-md-6 col-lg-3">
                    <div class="card card-custom">
                        @if($guru->foto)
                            <img src="{{ asset('storage/' . (str_contains($guru->foto, '/') ? $guru->foto : 'guru/' . $guru->foto)) }}" alt="Foto {{ $guru->nama_guru }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary" style="height:220px;">
                                <i class="fas fa-user-tie fa-4x text-white"></i>
                            </div>
                        @endif
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $guru->nama_guru }}</h5>
                            <p class="text-muted mb-1">{{ $guru->mata_pelajaran }}</p>
                            <small class="text-secondary d-block">NIP: {{ $guru->nip }}</small>
                            <a href="{{ route('guru.landing-detail', ['nama' => $guru->nama_guru]) }}" class="btn btn-success btn-sm mt-3">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><div class="alert alert-secondary text-center">Data guru belum tersedia.</div></div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('landing.semua-guru') }}" class="btn btn-success">Lihat Semua Guru</a>
        </div>
    </div>
</section>

<!-- DATA SISWA -->
<section class="section bg-light" id="siswa">
    <div class="container">
        <div class="section-title">
            <h2>Data Siswa</h2>
            <p>Peserta didik {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }} — Total {{ $totalSiswa }} siswa</p>
        </div>

        <div class="card" style="border: none; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
            <div class="card-body p-4">

                @if($siswas->count() > 0)

                    <div class="table-responsive">
                        <table class="table table-siswa table-hover">
                            <thead>
                                <tr>
                                    <th width="60" class="text-center">No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswas as $index => $siswa)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td class="fw-semibold">{{ $siswa->nama_siswa }}</td>
                                        <td><span class="badge-kelas">{{ $siswa->kelas }}</span></td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @else

                    <div class="text-center py-5">
                        <i class="fas fa-user-graduate fa-4x text-secondary mb-3"></i>
                        <p class="text-muted mb-0">Data siswa belum tersedia.</p>
                    </div>

                @endif

            </div>
        </div>

    </div>
</section>

<!-- BERITA -->
<section class="section" id="berita">
    <div class="container">
        <div class="section-title">
            <h2>Berita</h2>
            <p>Informasi terbaru dari sekolah</p>
        </div>

        <div class="row g-4">
            @forelse($beritas as $berita)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom">
                        @if($berita->foto)
                            <img src="{{ asset('storage/berita/' . $berita->foto) }}" alt="{{ $berita->judul }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary" style="height:220px;">
                                <i class="fas fa-newspaper fa-4x text-white"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $berita->judul }}</h5>
                            <small class="text-muted"><i class="fas fa-calendar me-1"></i>{{ $berita->tanggal }}</small>
                            <p class="mt-3">{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 120) }}</p>
                            <a href="{{ route('berita.landing-detail', $berita->judul) }}" class="btn btn-success btn-sm">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><div class="alert alert-secondary text-center">Berita belum tersedia.</div></div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('landing.berita') }}" class="btn btn-success">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<!-- GALERI -->
<section class="section bg-light" id="galeri">
    <div class="container">
        <div class="section-title">
            <h2>Galeri</h2>
            <p>Dokumentasi kegiatan sekolah</p>
        </div>

        <div class="row g-4">
            @forelse($galeris as $galeri)
                <div class="col-6 col-md-4 col-lg-3">

                    @if($galeri->gambar)
                        <img src="{{ asset('storage/' . $galeri->gambar) }}"
                             alt="{{ $galeri->judul }}"
                             class="gallery-img">

                    @elseif($galeri->video && \Illuminate\Support\Str::startsWith($galeri->video, ['http://', 'https://']))
                        @php
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $galeri->video, $yt);
                            $youtubeId = $yt[1] ?? '';
                        @endphp
                        @if($youtubeId)
                            <iframe class="gallery-video"
                                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                    title="{{ $galeri->judul }}"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                            </iframe>
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary" style="height:230px; border-radius:12px;">
                                <i class="fas fa-video fa-4x text-white"></i>
                            </div>
                        @endif

                    @elseif($galeri->video)
                        <video class="gallery-img" controls preload="metadata">
                            <source src="{{ asset('storage/' . $galeri->video) }}" type="video/mp4">
                            Browser kamu tidak mendukung video.
                        </video>

                    @else
                        <div class="d-flex align-items-center justify-content-center bg-secondary" style="height:230px; border-radius:12px;">
                            <i class="fas fa-image fa-4x text-white"></i>
                        </div>
                    @endif

                    <div class="text-center mt-2">
                        <h6 class="fw-bold mb-1">{{ $galeri->judul }}</h6>

                        @if($galeri->deskripsi)
                            <p class="text-muted small mb-2">{{ $galeri->deskripsi }}</p>
                        @endif

                        <form action="{{ route('galeri.landing-detail') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="galeri_id" value="{{ $galeri->getKey() }}">
                            <button type="submit" class="btn btn-success btn-sm mt-2">Lihat Selengkapnya</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-12"><div class="alert alert-secondary text-center">Galeri belum tersedia.</div></div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('landing.galeri') }}" class="btn btn-success">Lihat Semua Galeri</a>
        </div>
    </div>
</section>

<!-- EKSTRAKULIKULER -->
<section class="section" id="ekstrakulikuler">
    <div class="container">
        <div class="section-title">
            <h2>Ekstrakulikuler</h2>
            <p>Kegiatan ekstrakulikuler sekolah</p>
        </div>

        <div class="row g-4">
            @forelse($ekstrakulikulers as $ekstrakulikuler)
                <div class="col-md-6 col-lg-3">
                    <div class="card card-custom">
                        @if($ekstrakulikuler->gambar)
                            <img src="{{ asset('storage/' . $ekstrakulikuler->gambar) }}" alt="{{ $ekstrakulikuler->nama_ekstrakulikuler }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary" style="height:220px;">
                                <i class="fas fa-school fa-4x text-white"></i>
                            </div>
                        @endif
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $ekstrakulikuler->nama_ekstrakulikuler }}</h5>
                            <p class="text-muted">{{ $ekstrakulikuler->deskripsi }}</p>
                            <a href="{{ route('ekstrakulikuler.landing-detail', $ekstrakulikuler->nama_ekstrakulikuler) }}" class="btn btn-success btn-sm mt-2">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><div class="alert alert-secondary text-center">Data ekstrakulikuler belum tersedia.</div></div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/ekstrakulikuler') }}" class="btn btn-success">Lihat Semua Ekstrakulikuler</a>
        </div>
    </div>
</section>

<!-- FOOTER -->
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
                <p class="mb-2"><a href="{{ url('/') }}#siswa"><i class="fas fa-angle-right me-2"></i>Siswa</a></p>
                <p class="mb-2"><a href="{{ url('/') }}#berita"><i class="fas fa-angle-right me-2"></i>Berita</a></p>
                <p class="mb-2"><a href="{{ url('/') }}#galeri"><i class="fas fa-angle-right me-2"></i>Galeri</a></p>
                <p class="mb-2"><a href="{{ url('/') }}#ekstrakulikuler"><i class="fas fa-angle-right me-2"></i>Ekstrakulikuler</a></p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Kontak Sekolah</h5>
                <p class="mb-2"><i class="fas fa-location-dot me-2"></i>{{ $profil->alamat ?? '-' }}</p>
                <p class="mb-2"><i class="fas fa-phone me-2"></i>{{ $profil->telp ?? '-' }}</p>
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
                    <small>© {{ date('Y') }} {{ $profil->nama_sekolah ?? 'MI Nurul Anwar' }}</small>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small>Bekasi Timur</small>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-indicators button');
    const prev = document.querySelector('.hero-prev');
    const next = document.querySelector('.hero-next');

    if (slides.length && prev && next) {
        let current = 0, timer;
        function showSlide(index) {
            current = (index + slides.length) % slides.length;
            slides.forEach((s,i) => s.classList.toggle('active', i === current));
            dots.forEach((d,i) => d.classList.toggle('active', i === current));
        }
        function startAutoSlide() {
            clearInterval(timer);
            timer = setInterval(() => showSlide(current + 1), 5000);
        }
        prev.addEventListener('click', () => { showSlide(current - 1); startAutoSlide(); });
        next.addEventListener('click', () => { showSlide(current + 1); startAutoSlide(); });
        dots.forEach((d,i) => d.addEventListener('click', () => { showSlide(i); startAutoSlide(); }));
        startAutoSlide();
    }
});
</script>

</body>
</html>