@include('navigasi.navbar')

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Scan QR Code | VokeTrack</title>
  <meta name="description" content="Scan QR Code barang dengan VokeTrack.">
  <meta name="keywords" content="Scan QR, VokeTrack, Laravel, Tracking Barang">
  <meta name="author" content="VokeTrack Team">

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('upload/Logo.jpg') }}" type="image/x-icon">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>

  <style>
    body {
      background: linear-gradient(135deg, #ffffff, #5b97ff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Public Sans', sans-serif;
    }

    .scan-container {
      background-color: white;
      color: #2e4b9c;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    #reader {
      width: 100%;
      height: auto;
      margin-top: 20px;
      border-radius: 10px;
      overflow: hidden;
    }

    .alert {
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <div class="scan-container">
    <h3 class="mb-3"><b>Scan QR Code</b></h3>
    <p class="text-muted">Arahkan kamera ke QR Code untuk melakukan scan.</p>

    <div id="reader"></div>
    <p id="result"></p>

    @if(session('error'))
      <div class="alert alert-danger mt-3">
        {{ session('error') }}
      </div>
    @endif
  </div>

  <!-- Scripts -->
  <script>
    function onScanSuccess(decodedText) {
      window.location.href = `/scan/check/${decodedText}`;
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
