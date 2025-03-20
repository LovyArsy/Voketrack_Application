
@include('navigasi.navbars')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code - VokeTrack</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ffffff, #5b97ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .scan-container {
            background: rgba(255, 255, 255, 0.1);
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
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="scan-container">
    <h2>Scan QR Code</h2>
    <p>Arahkan kamera ke QR Code untuk melakukan scan.</p>
    <div id="reader"></div>
    <p id="result"></p>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
