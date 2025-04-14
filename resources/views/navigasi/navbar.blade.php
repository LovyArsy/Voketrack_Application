<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        .navbar-profile {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px 20px;
            background-color: white;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); opsional */
        }

        .navbar-profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .navbar-profile h5 {
            /* margin-left: 10px; */
            /* font-size: 16px; */
            color: #006699;
        }
    </style>
</head>
<body>
    <div class="navbar-profile">
        @if (session('guru_foto') && session('guru_nama'))
            <!-- Menampilkan foto dan nama guru jika session 'guru_foto' dan 'guru_nama' ada -->
            <img src="{{ asset('profil/' . session('guru_foto')) }}" alt="Foto Guru">
            <h5 class="mt-1 p-2">{{ session('guru_nama') }}</h5>
        @elseif (session('siswa_gambar') && session('siswa_nama'))
            <!-- Menampilkan foto dan nama siswa jika session 'siswa_foto' dan 'siswa_nama' ada -->
            <img src="{{ asset('profil/' . session('siswa_gambar')) }}" alt="Foto Siswa">
            <h5 class="mt-1 p-2">{{ session('siswa_nama') }}</h5>
        @endif
    </div>
</body>
</html>
