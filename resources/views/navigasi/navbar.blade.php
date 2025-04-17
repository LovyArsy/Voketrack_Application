<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>

        body{
            display: flex;
            /* align-items: center; */
            width: 100%;
            justify-content: center;
            /* padding: 10px 20px; */
        }

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

        @media (max-width: 768px){
            h5{
                display: none;
            }

        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="navbar-profile">
        {{-- <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div> --}}
        @if (session('guru_foto') && session('guru_nama'))
            <!-- Menampilkan foto dan nama guru jika session 'guru_foto' dan 'guru_nama' ada -->
            <div class="d-flex">
                <img src="{{ asset('profil/' . session('guru_foto')) }}" alt="Foto Guru">
                <h5 class="mt-1 p-2">{{ session('guru_nama') }}</h5>
            </div>
        @elseif (session('siswa_gambar') && session('siswa_nama'))
            <!-- Menampilkan foto dan nama siswa jika session 'siswa_foto' dan 'siswa_nama' ada -->
            <div class="d-flex">
                <img src="{{ asset('profil/' . session('siswa_gambar')) }}" alt="Foto Siswa">
                <h5 class="mt-1 p-2">{{ session('siswa_nama') }}</h5>
            </div>
        @endif
    </div>
</body>
</html>
