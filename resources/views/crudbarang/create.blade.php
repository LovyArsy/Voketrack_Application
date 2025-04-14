
@include('navigasi.navbar')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #007bff, #6610f2);
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
        }
        .card-body {
            padding: 20px;
        }
        .alert {
            margin-top: 1px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Barang
        </div>
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="{{ strtoupper(Str::random(8)) }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" min="1" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
