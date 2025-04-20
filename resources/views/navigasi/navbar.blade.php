<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .navbar-profile {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px 20px;
            background-color: white;
        }

        .profile-box {
            display: flex;
            align-items: center;
        }

        .profile-box img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
            margin-right: 10px;
        }

        .profile-box h5 {
            margin: 0;
            font-size: 16px;
            color: #006699;
        }

        @media (max-width: 576px) {
            .profile-box h5 {
                font-size: 14px;
            }

            .profile-box img {
                width: 35px;
                height: 35px;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="navbar-profile">
        @if (session('guru_foto') && session('guru_nama'))
            <div class="profile-box">
                <img src="{{ asset('profil/' . session('guru_foto')) }}" alt="Foto Guru">
                <h5>{{ session('guru_nama') }}</h5>
            </div>
        @elseif (session('siswa_gambar') && session('siswa_nama'))
            <div class="profile-box">
                <img src="{{ asset('profil/' . session('siswa_gambar')) }}" alt="Foto Siswa">
                <h5>{{ session('siswa_nama') }}</h5>
            </div>
        @endif
    </div>
</body>
</html>
