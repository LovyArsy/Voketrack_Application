<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 40px;
        }
        .card {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .card h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        input[type="submit"],
        .btn-back {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 18px;
            cursor: pointer;
            border-radius: 8px;
            text-decoration: none;
        }
        input[type="submit"]:hover,
        .btn-back:hover {
            background-color: #2980b9;
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @include('navigasi.navbar')

    <div class="card">
        <a href="{{ route('guru.index') }}" class="btn-back">← Kembali ke Daftar User</a>

        <h2>Edit Data Siswa</h2>

        @if ($errors->any())
            <div class="error">
                <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $siswa->name) }}">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label>Username</label>
            <input type="text" name="username" value="{{ old('username', $siswa->username) }}">
            @error('username') <div class="error">{{ $message }}</div> @enderror

            <label>Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password">
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label>Gambar Profil (biarkan kosong jika tidak ganti)</label>
            <input type="file" name="gambar">
            @error('gambar') <div class="error">{{ $message }}</div> @enderror

            <input type="submit" value="Update">
        </form>
    </div>

</body>
</html>
