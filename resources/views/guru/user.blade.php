@include('navigasi.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Guru & Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 260px;
            text-align: center;
            padding: 20px;
            position: relative;
        }

        .card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
        }

        .sub {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .tag {
            padding: 5px 10px;
            font-size: 12px;
            color: white;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .guru {
            background-color: #4CAF50;
        }

        .siswa {
            background-color: #2196F3;
        }

        .actions a {
            display: inline-block;
            margin: 5px 8px;
            padding: 5px 12px;
            border-radius: 5px;
            font-size: 13px;
            text-decoration: none;
            color: white;
        }

        .edit {
            background-color: #ff9800;
        }

        .delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>

    <h1>Data Guru & Siswa</h1>
    <div style="text-align: center; margin-bottom: 30px;">
    <a href="{{ route('guru.create') }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 8px; margin-right: 10px;">+ Tambah Guru</a>
    <a href="{{ route('siswa.create') }}" style="padding: 10px 20px; background-color: #2196F3; color: white; text-decoration: none; border-radius: 8px;">+ Tambah Siswa</a>
</div>


    <div class="container">
        {{-- Data Guru --}}
        @foreach ($gurus as $guru)
            <div class="card">
                <img src="{{ asset('profil/' . $guru->gambar) }}" alt="Foto Guru">
                <div class="title">{{ $guru->name }}</div>
                <div class="sub">Username: {{ $guru->username }}</div>
                <span class="tag guru">Guru</span>
                <div class="actions">
                    <a href="{{ route('guru.edit', $guru->id) }}" class="edit">Edit</a>
                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data siswa ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">
                            Hapus
                        </button>
                    </form>     
                </div>
            </div>
        @endforeach

        {{-- Data Siswa --}}
        @foreach ($siswas as $siswa)
            <div class="card">
                <img src="{{ asset('profil/' . $siswa->gambar) }}" alt="Foto Siswa">
                <div class="title">{{ $siswa->name }}</div>
                <div class="sub">Username: {{ $siswa->username }}</div>
                <span class="tag siswa">Siswa</span>
                <div class="actions">
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="edit">Edit</a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data siswa ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
