@include('navigasi.navbar')
@include('navigasi.sidebar')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code - VokeTrack</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Global styles */
                body, html {
            height: 100%; /* Pastikan body dan html memiliki tinggi penuh */
            margin: 0;
        }

body {
    /* background: linear-gradient(135deg, #ffffff, #5b97ff); */
    display: flex;
    flex-direction: column; /* Kolom untuk layout sidebar dan navbar */
}

.sidebar {
    width: 250px;
    background-color: rgb(49, 172, 225);
    /* box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); */
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh; /* Penuhi seluruh tinggi layar */
    padding: 20px 15px;
    overflow-y: auto;
}

.navbar {
    margin-left: 250px;
    z-index: 10;
    /* box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); */
    position: relative; /* Navbar bergerak turun sesuai konten */
}

.main-content {
    margin-left: 250px;
    flex-grow: 1; /* Membuat konten utama mengisi ruang yang tersisa */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    /* margin-top: 70px; Sesuaikan margin sesuai dengan tinggi navbar */
    height: calc(100vh - 70px); /* Sesuaikan tinggi konten utama untuk menghindari tumpang tindih dengan navbar */
}

.scan-container {
    background-color: white;
    color: #5b97ff;
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 500px;
}

#reader {
    width: 100%;
    height: auto;
    border-radius: 10px;
    overflow: hidden;
}

.alert {
    margin-top: 10px;
}

@media (max-width: 768px) {
    body {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        position: relative;
        height: auto;
    }

    .navbar {
        margin-left: 0;
    }

    .main-content {
        margin-left: 0;
    }
}

    </style>
</head>
<body>

    <div class="sidebar">
        @include('navigasi.sidebars')
    </div>

    <!-- Navbar moved below sidebar -->
    {{-- @include('navigasi.navbar') --}}
    {{-- <div class="w-full bg-danger">
        tes
    </div> --}}

    <div class="main-content">
        <div class="scan-container">
            <h2>Scan QR Code</h2>
            <p>Arahkan kamera ke QR Code untuk melakukan scan.</p>
            <div id="reader"></div>
            <p id="result"></p>

            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function onScanSuccess(decodedText) {
            window.location.href = `/scans/check/${decodedText}`;
        }

        const html5QrCode = new Html5Qrcode("reader");
        html5QrCode.start(
            { facingMode: "environment" },
            {
                fps: 10,
                qrbox: { width: 250, height: 250 }
            },
            onScanSuccess
        );
    </script>

</body>
</html>
