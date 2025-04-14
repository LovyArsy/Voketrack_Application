@include('navigasi.navbar')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-size: cover;
            height: 100vh;
            padding: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
        }

        .container-custom {
            background: rgba(255, 255, 255, 0.15);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            backdrop-filter: blur(20px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            /* margin: 5% */
            /* max-width: 1200px; */
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .table {
            background: rgba(0, 0, 0, 0.4);
            border-radius: 10px;
            overflow: hidden;
            align-items: center;
            justify-content: center;
        }

        .table th {
            color: white;
            background: rgba(0, 0, 0, 0.7);
        }

        .table td {
            color: #000000;
            /* background-color: #00aaff; */
            /* display: flex; */
            align-items: center;
            justify-content: center;
            vertical-align: middle;
            /* text-align: center; */
        }

        .btn-custom {
            background: linear-gradient(45deg, #00aaff, #0088cc);
            border: none;
            padding: 10px 15px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #0088cc, #006699);
            transform: scale(1.05);
            color: white;
        }

        @media (max-width: 768px) {
            .container-custom {
                padding: 20px;
                max-width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <h2 class="text-black" style="font-weight: 700;">Daftar Barang</h2>
        <div class="w-full text-end">
            <a href="{{ route('barang.create') }}" class="btn btn-custom mb-3">Tambah Barang</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <img src="{{ asset('barangs/' . $item->image) }}" width="80" class="rounded" alt="Barang Image">
                    </td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <a href="{{ route('barang.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
