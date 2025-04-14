<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Guru - VokeTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .main-content {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px 20px;
            min-height: 100vh;
        }

        .form-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .form-card h2 {
            margin-bottom: 25px;
            font-weight: bold;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            margin-top: 15px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary, .btn-secondary {
            border-radius: 10px;
            padding: 10px 20px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .text-danger {
            font-size: 14px;
            margin-top: 4px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    @include('navigasi.navbar')

    <div class="main-content">
        <div class="form-card">
            <a href="{{ route('guru.index') }}" class="btn btn-secondary back-link">← Kembali ke Daftar User</a>

            <h2>Tambah Data Guru</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror

                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                @error('username') <div class="text-danger">{{ $message }}</div> @enderror

                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror

                <label for="gambar" class="form-label">Gambar Profil</label>
                <input type="file" name="gambar" class="form-control">
                @error('gambar') <div class="text-danger">{{ $message }}</div> @enderror

                <div class="mt-4 d-flex justify-content-end">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
