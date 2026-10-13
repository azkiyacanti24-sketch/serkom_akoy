<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Saya - MI Nurul Anwar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        body { background: #f8f9fa; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }

        /* NAVBAR */
        .navbar { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .navbar-brand { font-weight: bold; color: #198754 !important; display: flex; align-items: center; gap: 10px; }
        .navbar-brand img { width: 38px; height: 38px; object-fit: contain; }
        .navbar-brand small { display: block; font-size: 12px; color: #777; font-weight: normal; }
        .nav-link { font-weight: 500; color: #333 !important; }
        .nav-link:hover { color: #198754 !important; }

        /* HEADER PROFIL */
        .header-profil {
            background: linear-gradient(135deg, #198754 0%, #157347 100%);
            padding: 60px 20px 80px;
            text-align: center;
            color: white;
            border-radius: 0 0 30px 30px;
            position: relative;
            margin-top: 0;
        }
        .header-profil .avatar {
            width: 110px; height: 110px; border-radius: 50%;
            border: 4px solid white; object-fit: cover;
            margin-bottom: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        .header-profil .avatar-icon {
            width: 110px; height: 110px; border-radius: 50%;
            border: 4px solid white;
            background: rgba(255,255,255,0.2);
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 50px; color: white; margin-bottom: 15px;
        }
        .header-profil h4 { font-weight: bold; margin-bottom: 5px; }
        .header-profil p { opacity: 0.9; margin-bottom: 0; font-size: 14px; }

        /* CARD SECTION */
        .section-card {
            background: white; border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            margin-bottom: 20px; overflow: hidden;
        }
        .section-card .section-header {
            padding: 15px 20px; border-bottom: 1px solid #f0f0f0;
            font-weight: 600; color: #333;
        }
        .section-card .section-header i { color: #198754; margin-right: 10px; }

        .info-row {
            display: flex; align-items: center;
            padding: 15px 20px; border-bottom: 1px solid #f8f9fa;
        }
        .info-row:last-child { border-bottom: none; }
        .info-row .info-icon {
            width: 40px; height: 40px; border-radius: 10px;
            background: #e8f5e9; color: #198754;
            display: flex; align-items: center; justify-content: center;
            margin-right: 15px; font-size: 16px; flex-shrink: 0;
        }
        .info-row .info-content { flex-grow: 1; }
        .info-row .info-label { font-size: 12px; color: #999; margin-bottom: 3px; }
        .info-row .info-value { font-weight: 500; color: #333; font-size: 14px; }

        .pengaturan-item {
            display: flex; align-items: center;
            padding: 15px 20px; border-bottom: 1px solid #f8f9fa;
            text-decoration: none; color: #333;
            transition: background 0.2s;
        }
        .pengaturan-item:last-child { border-bottom: none; }
        .pengaturan-item:hover { background: #f8f9fa; color: #333; }
        .pengaturan-item .icon-box {
            width: 40px; height: 40px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            margin-right: 15px; font-size: 16px; flex-shrink: 0;
        }
        .pengaturan-item .icon-edit { background: #e8f5e9; color: #198754; }
        .pengaturan-item .icon-logout { background: #ffe5e5; color: #dc3545; }
        .pengaturan-item .pengaturan-text { flex-grow: 1; text-align: left; }
        .pengaturan-item .pengaturan-title { font-weight: 600; font-size: 14px; margin-bottom: 2px; }
        .pengaturan-item .pengaturan-desc { font-size: 12px; color: #999; }
        .pengaturan-item .chevron { color: #ccc; }

        .content-wrapper { margin-top: -50px; padding: 0 15px 30px; position: relative; z-index: 2; }
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
            </ul>
        </div>
    </div>
</nav>

<!-- HEADER PROFIL -->
<div class="header-profil">
    @if($user->foto)
        <img src="{{ asset('storage/user/' . $user->foto) }}" alt="Foto Profil" class="avatar">
    @else
        <div class="avatar-icon"><i class="fas fa-user"></i></div>
    @endif

    <h4>{{ $user->name }}</h4>
    <p>@ {{ $user->username }}</p>
</div>

<!-- CONTENT -->
<div class="container content-wrapper" style="max-width: 700px;">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- INFORMASI PROFIL -->
    <div class="section-card">
        <div class="section-header"><i class="fas fa-info-circle"></i> Informasi Profil</div>

        <div class="info-row">
            <div class="info-icon"><i class="fas fa-user"></i></div>
            <div class="info-content">
                <div class="info-label">Username</div>
                <div class="info-value">{{ $user->username }}</div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="fas fa-envelope"></i></div>
            <div class="info-content">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $user->email ?? '-' }}</div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="fas fa-phone"></i></div>
            <div class="info-content">
                <div class="info-label">Nomor HP</div>
                <div class="info-value">{{ $user->no_hp ?? '-' }}</div>
            </div>
        </div>
    </div>

    <!-- PROFILE -->
    <div class="section-card">
        <div class="section-header"><i class="fas fa-id-card"></i> Profile</div>

        <div class="info-row">
            <div class="info-icon"><i class="fas fa-venus-mars"></i></div>
            <div class="info-content">
                <div class="info-label">Jenis Kelamin</div>
                <div class="info-value">{{ $user->jenis_kelamin ?? '-' }}</div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div class="info-content">
                <div class="info-label">Tempat Lahir</div>
                <div class="info-value">{{ $user->tempat_lahir ?? '-' }}</div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="fas fa-calendar-alt"></i></div>
            <div class="info-content">
                <div class="info-label">Tanggal Lahir</div>
                <div class="info-value">{{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') : '-' }}</div>
            </div>
        </div>

        <div class="info-row">
            <div class="info-icon"><i class="fas fa-home"></i></div>
            <div class="info-content">
                <div class="info-label">Alamat</div>
                <div class="info-value">{{ $user->alamat ?? '-' }}</div>
            </div>
        </div>
    </div>

    <!-- PENGATURAN AKUN -->
    <div class="section-card">
        <div class="section-header"><i class="fas fa-cog"></i> Pengaturan Akun</div>

        <a href="{{ route('profil-saya.edit') }}" class="pengaturan-item">
            <div class="icon-box icon-edit"><i class="fas fa-pen"></i></div>
            <div class="pengaturan-text">
                <div class="pengaturan-title">Edit Profil</div>
                <div class="pengaturan-desc">Perbarui data diri Anda</div>
            </div>
            <i class="fas fa-chevron-right chevron"></i>
        </a>

        <a href="{{ url('/') }}" class="pengaturan-item">
            <div class="icon-box icon-edit"><i class="fas fa-arrow-left"></i></div>
            <div class="pengaturan-text">
                <div class="pengaturan-title">Kembali ke Beranda</div>
                <div class="pengaturan-desc">Kembali ke landing page</div>
            </div>
            <i class="fas fa-chevron-right chevron"></i>
        </a>

        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="pengaturan-item w-100 border-0 bg-transparent"
                    onclick="return confirm('Yakin ingin keluar?')">
                <div class="icon-box icon-logout"><i class="fas fa-sign-out-alt"></i></div>
                <div class="pengaturan-text">
                    <div class="pengaturan-title">Keluar</div>
                    <div class="pengaturan-desc">Logout dari akun</div>
                </div>
                <i class="fas fa-chevron-right chevron"></i>
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>