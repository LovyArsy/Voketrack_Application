<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            display: flex;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .main-content {
            width: calc(100% - 250px);
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .content-area {
            flex: 1;
            overflow-y: auto;
            padding: 25px;
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
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .table th {
            color: white;
            background: rgba(0, 0, 0, 0.7);
        }

        .table td {
            color: #000;
            vertical-align: middle;
        }

        .btn-custom {
            background: linear-gradient(45deg, #00aaff, #0088cc);
            border: none;
            padding: 10px 15px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #0088cc, #006699);
            transform: scale(1.05);
            color: white;
        }

        .table-responsive-custom {
            overflow-x: auto;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .container-custom {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    @include('navigasi.sidebar')

    <div class="main-content">
        {{-- Navbar hanya foto profil --}}
        @include('navigasi.navbar')

        <div class="content-area">
            <div class="container-custom">
                <h2 class="text-black fw-bold">Daftar Barang</h2>
                <div class="w-100 text-end">
                    <a href="{{ route('barang.create') }}" class="btn text-white btn-custom mb-3">Tambah Barang</a>
                </div>

                <div class="table-responsive-custom">
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

            </div>
        </div>
    </div>

</body>
</html>
