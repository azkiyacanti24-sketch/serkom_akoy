<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Galeri - MI Nurul Anwar</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        .sb-topnav { background-color: #198754 !important; }
        #layoutSidenav_nav .sb-sidenav,
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu,
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-footer { background-color: #198754 !important; }
        #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu-heading { color: rgba(255,255,255,0.7) !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link,
        #layoutSidenav_nav .sb-sidenav .nav-link .sb-nav-link-icon,
        #layoutSidenav_nav .sb-sidenav-footer { color: #fff !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link:hover { background-color: rgba(255,255,255,0.12) !important; color: #fff !important; }
        #layoutSidenav_nav .sb-sidenav .nav-link.active { background-color: rgba(255,255,255,0.18) !important; color: #fff !important; }

        .btn-sidebar { background-color: #198754 !important; border-color: #198754 !important; color: #fff !important; }
        .btn-sidebar:hover { background-color: #157347 !important; border-color: #157347 !important; color: #fff !important; }

        .dataTable-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px; }
        .dataTable-dropdown { display: flex; align-items: center; gap: 8px; }
        .dataTable-dropdown select { width: auto; min-width: 70px; padding: 5px 30px 5px 10px; border: 1px solid #ced4da; border-radius: 5px; background-color: #fff; }
        .dataTable-search { display: flex; align-items: center; gap: 8px; }
        .dataTable-search input { width: 220px; padding: 7px 10px; border: 1px solid #ced4da; border-radius: 5px; outline: none; }
        .dataTable-search input:focus { border-color: #198754; box-shadow: 0 0 0 0.15rem rgba(25,135,84,0.15); }

        .dataTable-bottom { display: flex; justify-content: space-between; align-items: center; margin-top: 20px; flex-wrap: wrap; gap: 15px; }
        .dataTable-info { color: #6c757d; font-size: 14px; }
        .dataTable-pagination { display: flex; align-items: center; gap: 5px; }
        .dataTable-pagination button { border: 1px solid #dee2e6; background: #fff; color: #198754; padding: 6px 11px; border-radius: 5px; cursor: pointer; }
        .dataTable-pagination button:hover { background: #198754; color: #fff; }
        .dataTable-pagination button.active { background: #198754; color: #fff; border-color: #198754; }
        .dataTable-pagination button:disabled, .dataTable-pagination button:disabled:hover { color: #adb5bd; background: #f8f9fa; cursor: not-allowed; }

        .gambar-galeri { height: 220px; object-fit: cover; width: 100%; }

        @media (max-width: 768px) {
            .dataTable-top, .dataTable-bottom { align-items: stretch; flex-direction: column; }
            .dataTable-search { width: 100%; }
            .dataTable-search input { width: 100%; }
            .dataTable-pagination { justify-content: center; flex-wrap: wrap; }
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
                    <h1 class="mt-4">Data Galeri</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Galeri</li>
                    </ol>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-images me-1"></i> Data Galeri</div>
                            @if(Auth::user()->role === 'Admin')
                                <a href="{{ route('galeri.create') }}" class="btn btn-sidebar btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah Galeri
                                </a>
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="dataTable-top">
                                <div class="dataTable-dropdown">
                                    <select id="jumlahPerHalaman">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <span>entries per page</span>
                                </div>
                                <div class="dataTable-search">
                                    <label for="searchGaleri">Search:</label>
                                    <input type="text" id="searchGaleri">
                                </div>
                            </div>

                            <div class="row" id="daftarGaleri">
                                @forelse($galeris as $galeri)
                                    <div class="col-md-6 col-lg-4 mb-4 galeri-item">
                                        <div class="card h-100 shadow-sm">

                                            {{-- CEK: gambar / video file / video youtube --}}
                                            @if($galeri->gambar)
                                                <img src="{{ asset('storage/' . $galeri->gambar) }}"
                                                     class="card-img-top gambar-galeri"
                                                     alt="{{ $galeri->judul }}">

                                            @elseif($galeri->video && (Str::startsWith($galeri->video, 'http://') || Str::startsWith($galeri->video, 'https://')))
                                                {{-- YouTube --}}
                                                @php
                                                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $galeri->video, $yt);
                                                    $youtubeId = $yt[1] ?? '';
                                                @endphp
                                                @if($youtubeId)
                                                    <iframe class="card-img-top gambar-galeri"
                                                            src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                            frameborder="0"
                                                            allowfullscreen></iframe>
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center bg-light" style="height:220px;">
                                                        <i class="fas fa-video fa-4x text-secondary"></i>
                                                    </div>
                                                @endif

                                            @elseif($galeri->video)
                                                {{-- Video file --}}
                                                <video class="card-img-top gambar-galeri" controls>
                                                    <source src="{{ asset('storage/' . $galeri->video) }}" type="video/mp4">
                                                    Browser kamu tidak mendukung pemutaran video.
                                                </video>

                                            @else
                                                <div class="d-flex align-items-center justify-content-center bg-light" style="height:220px;">
                                                    <i class="fas fa-images fa-4x text-secondary"></i>
                                                </div>
                                            @endif

                                            <div class="card-body">
                                                <h5 class="card-title judul-galeri">{{ $galeri->judul }}</h5>
                                                <p class="card-text mt-3 isi-galeri">
                                                    {{ \Illuminate\Support\Str::limit($galeri->deskripsi, 120) }}
                                                </p>
                                            </div>

                                            <div class="card-footer bg-white border-0 pb-3">
                                                @if(Auth::user()->role === 'Admin')
                                                    {{-- EDIT: Link GET --}}
                                                    <form action="{{ route('galeri.edit') }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="galeri_id" value="{{ $galeri->getKey() }}">
                                                        <button type="submit" class="btn btn-sidebar btn-sm">
                                                            <i class="fas fa-edit me-1"></i>Edit
                                                        </button>
                                                    </form>
                                                    {{-- HAPUS: Form POST --}}
                                                    <form action="{{ route('galeri.delete') }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus galeri ini?');">
                                                        @csrf
                                                        <input type="hidden" name="galeri_id" value="{{ $galeri->getKey() }}">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash me-1"></i>Hapus
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('galeri.detail') }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="galeri_id" value="{{ $galeri->getKey() }}">
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            <i class="fas fa-eye me-1"></i>Detail
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-4">
                                        <i class="fas fa-images fa-4x text-secondary mb-3"></i>
                                        <h4>Belum ada galeri</h4>
                                        @if(Auth::user()->role === 'Admin')
                                            <a href="{{ route('galeri.create') }}" class="btn btn-sidebar">
                                                <i class="fas fa-plus me-1"></i>Tambah Galeri
                                            </a>
                                        @endif
                                    </div>
                                @endforelse
                            </div>

                            <div id="tidakDitemukan" class="text-center py-5" style="display:none;">
                                <i class="fas fa-search fa-4x text-secondary mb-3"></i>
                                <h4>Galeri tidak ditemukan</h4>
                            </div>

                            <div class="dataTable-bottom">
                                <div class="dataTable-info" id="infoGaleri"></div>
                                <div class="dataTable-pagination" id="paginationGaleri"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">© {{ date('Y') }} MI Nurul Anwar</div>
                        <div class="text-muted">Bekasi Timur</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const semuaGaleri = Array.from(document.querySelectorAll('.galeri-item'));
            const searchInput = document.getElementById('searchGaleri');
            const jumlahPerHalaman = document.getElementById('jumlahPerHalaman');
            const pagination = document.getElementById('paginationGaleri');
            const infoGaleri = document.getElementById('infoGaleri');
            const tidakDitemukan = document.getElementById('tidakDitemukan');

            let halamanSekarang = 1;
            let perHalaman = 10;
            let hasilPencarian = [...semuaGaleri];

            function tampilkanGaleri() {
                const mulai = (halamanSekarang - 1) * perHalaman;
                const akhir = mulai + perHalaman;

                semuaGaleri.forEach(item => item.style.display = 'none');
                hasilPencarian.slice(mulai, akhir).forEach(item => item.style.display = '');

                if (hasilPencarian.length === 0) {
                    tidakDitemukan.style.display = 'block';
                    infoGaleri.textContent = 'Showing 0 to 0 of 0 entries';
                } else {
                    tidakDitemukan.style.display = 'none';
                    infoGaleri.textContent = 'Showing ' + (mulai + 1) + ' to ' + Math.min(akhir, hasilPencarian.length) + ' of ' + hasilPencarian.length + ' entries';
                }

                buatPagination();
            }

            function buatPagination() {
                pagination.innerHTML = '';
                const jumlahHalaman = Math.ceil(hasilPencarian.length / perHalaman);
                if (jumlahHalaman <= 1) return;

                const btnPrev = document.createElement('button');
                btnPrev.textContent = 'Previous';
                btnPrev.disabled = halamanSekarang === 1;
                btnPrev.addEventListener('click', () => {
                    if (halamanSekarang > 1) { halamanSekarang--; tampilkanGaleri(); }
                });
                pagination.appendChild(btnPrev);

                for (let i = 1; i <= jumlahHalaman; i++) {
                    const btn = document.createElement('button');
                    btn.textContent = i;
                    if (i === halamanSekarang) btn.classList.add('active');
                    btn.addEventListener('click', () => { halamanSekarang = i; tampilkanGaleri(); });
                    pagination.appendChild(btn);
                }

                const btnNext = document.createElement('button');
                btnNext.textContent = 'Next';
                btnNext.disabled = halamanSekarang === jumlahHalaman;
                btnNext.addEventListener('click', () => {
                    if (halamanSekarang < jumlahHalaman) { halamanSekarang++; tampilkanGaleri(); }
                });
                pagination.appendChild(btnNext);
            }

            searchInput.addEventListener('input', function () {
                const kataKunci = this.value.toLowerCase().trim();
                hasilPencarian = semuaGaleri.filter(item => {
                    const judul = item.querySelector('.judul-galeri').textContent.toLowerCase();
                    const isi = item.querySelector('.isi-galeri').textContent.toLowerCase();
                    return judul.includes(kataKunci) || isi.includes(kataKunci);
                });
                halamanSekarang = 1;
                tampilkanGaleri();
            });

            jumlahPerHalaman.addEventListener('change', function () {
                perHalaman = parseInt(this.value, 10);
                halamanSekarang = 1;
                tampilkanGaleri();
            });

            tampilkanGaleri();
        });
    </script>
</body>
</html>