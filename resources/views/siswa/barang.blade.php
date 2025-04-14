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
            /* margin-left: 250px; */
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

        .table {
            background: rgba(0, 0, 0, 0.4);
            border-radius: 10px;
            overflow: hidden;
        }

        .table th {
            color: white;
            background: rgba(0, 0, 0, 0.7);
        }

        .table td {
            color: #000;
            vertical-align: middle;
            text-align: center;
            font-size: 18px;
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
    @include('navigasi.sidebars')

    <div class="main-content">

        {{-- Navbar --}}
        @include('navigasi.navbar')

        <div class="content-area">
            <div class="container-custom">
                <h2 class="text-black fw-bold">Daftar Barang</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>
</html>
