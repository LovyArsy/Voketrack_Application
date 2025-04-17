
@include('navigasi.navbar')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
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
            background: linear-gradient(135deg, #17a2b8, #007bff);
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
            margin-top: 10px;
        }
        .img-preview {
            display: block;
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Barang
        </div>
        <div class="card-body">
            <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="{{ $barang->kode }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $barang->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $barang->stok }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Barang</label>
                    @if($barang->image)
                        <img src="{{ asset('barangs/' . $barang->image) }}" alt="Gambar Barang" class="img-preview">
                    @endif
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
