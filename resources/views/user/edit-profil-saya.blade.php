<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil Saya - MI Nurul Anwar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        body { background: #f8f9fa; }
        .header-edit {
            background: linear-gradient(135deg, #198754 0%, #157347 100%);
            padding: 40px 20px;
            color: white;
            border-radius: 0 0 30px 30px;
        }
        .header-edit h4 { font-weight: bold; margin: 0; }
        .form-card {
            background: white; border-radius: 15px;
            padding: 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            margin-bottom: 20px;
        }
        .form-label { font-weight: 600; color: #333; margin-bottom: 8px; font-size: 14px; }
        .form-control, .form-select {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 15px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.15);
        }
        .btn-simpan {
            background: #198754; color: white; border: none;
            border-radius: 10px; padding: 12px;
            font-weight: 600; width: 100%;
        }
        .btn-simpan:hover { background: #157347; color: white; }
        .btn-kembali {
            background: #f0f0f0; color: #333; border-radius: 10px;
            padding: 12px; font-weight: 600; width: 100%;
            text-decoration: none; display: block;
            text-align: center; margin-bottom: 10px;
        }
        .btn-kembali:hover { background: #e0e0e0; color: #333; }
        .avatar-preview {
            width: 120px; height: 120px; border-radius: 50%;
            object-fit: cover; border: 4px solid #198754;
            display: block; margin: 0 auto 15px;
        }
    </style>
</head>
<body>

<div class="header-edit">
    <div class="container" style="max-width: 700px;">
        <h4><i class="fas fa-pen me-2"></i>Edit Profil</h4>
    </div>
</div>

<div class="container" style="max-width: 700px; margin-top: 20px;">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profil-saya.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-card text-center">
            <label class="form-label d-block text-center">Foto Profil</label>

            @if($user->foto)
                <img src="{{ asset('storage/user/' . $user->foto) }}" class="avatar-preview" id="previewFoto" alt="Foto Profil">
            @else
                <img src="" class="avatar-preview d-none" id="previewFoto" alt="Preview">
                <div class="avatar-preview d-flex align-items-center justify-content-center bg-light" id="previewContainer">
                    <i class="fas fa-user fa-4x text-secondary"></i>
                </div>
            @endif

            <input type="file" name="foto" id="foto" class="form-control mt-3" accept=".jpg,.jpeg,.png">
            <small class="text-muted d-block mt-2">Format JPG/PNG, maks 2 MB</small>
        </div>

        <div class="form-card">
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $user->no_hp) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>
            </div>
        </div>

        <a href="{{ route('profil-saya') }}" class="btn-kembali">Batal</a>
        <button type="submit" class="btn-simpan">
            <i class="fas fa-save me-2"></i> Simpan Perubahan
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('foto').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById('previewFoto');
        const container = document.getElementById('previewContainer');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
            if (container) container.classList.add('d-none');
        }
    });
</script>

</body>
</html>