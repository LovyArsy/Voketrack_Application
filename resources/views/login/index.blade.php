{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    body {
        background: url('{{ asset('upload/Background.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(5px);
        color: white; /* Menambahkan warna font putih di seluruh halaman */
    }

    .login-container {
        background: rgba(255, 255, 255, 0.1);
        color: white; /* Pastikan teks di dalam container login juga putih */
        padding: 30px;
        border-radius: 15px;
        backdrop-filter: blur(20px);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 400px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .form-control {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 8px;
        padding: 12px;
        color: white !important; /* Menyesuaikan warna teks di input agar putih */
        outline: none;
        transition: all 0.3s ease-in-out;
    }

    .form-control::placeholder {
        color: white; /* Mengubah warna placeholder menjadi putih */
    }

    .form-control:focus {
        border: 1px solid #00aaff;
        box-shadow: 0 0 10px rgba(0, 170, 255, 0.5);
        background: rgba(255, 255, 255, 0.3);
    }

    .btn-login {
        background: linear-gradient(45deg, #00aaff, #0088cc);
        border: none;
        padding: 12px;
        width: 100%;
        border-radius: 30px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .btn-login:hover {
        background: linear-gradient(45deg, #0088cc, #006699);
        color: white;
        transform: scale(1.05);
    }

    label {
        color: white; /* Mengubah warna label menjadi putih */
        font-weight: bold;
    }

    .alert {
        padding: 10px;
        border-radius: 5px;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 480px) {
        .login-container {
            padding: 20px;
            max-width: 90%;
        }
    }
</style>

</head>
<body>
    <div class="login-container">
        <div class="text-center">
            <img src="{{ asset('upload/Logo.jpg') }}" alt="Logo" width="80" class="mb-3">
            <h3 class=""><b>VokeTrack Application</b></h3>
            <p class="">Kelola dan lacak barang bengkel dengan mudah. Silakan login untuk memulai.</p>
        </div>

        @if(session('loginerror'))
            <div class="alert alert-danger">
                {{ session('loginerror') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control border border-2" id="username" name="username" required placeholder="Masukkan username">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control border text-black border-2" id="password" name="password" required placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>

 --}}
 <!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | VokeTrack</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="VokeTrack adalah sistem pelacakan barang berbasis web.">
  <meta name="keywords" content="VokeTrack, Dashboard, Admin, Pelacakan Barang, Laravel, Bootstrap">
  <meta name="author" content="VokeTrack Team">

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('upload/Logo.jpg') }}" type="image/x-icon">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css">
  <link rel="stylesheet" href="../assets/fonts/feather.css">
  <link rel="stylesheet" href="../assets/fonts/fontawesome.css">
  <link rel="stylesheet" href="../assets/fonts/material.css">
  <!-- Styles -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/style-preset.css">
</head>

<body>
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="auth-header"></div>
        <div class="card my-5">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
              <h3 class="mb-0"><b>Login</b></h3>
            </div>

            <!-- FORM LOGIN -->
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
              </div>
              
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
            <!-- END FORM -->

          </div>
        </div>
        <div class="auth-footer row">
          <div class="col my-1">
            <p class="m-0">© 2025 <a href="#">VokeTrack</a></p>
          </div>
          <div class="col-auto my-1">
            <ul class="list-inline footer-link mb-0">
              <li class="list-inline-item"><a href="#">Beranda</a></li>
              <li class="list-inline-item"><a href="#">Kebijakan Privasi</a></li>
              <li class="list-inline-item"><a href="#">Hubungi Kami</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="../assets/js/plugins/popper.min.js"></script>
  <script src="../assets/js/plugins/simplebar.min.js"></script>
  <script src="../assets/js/plugins/bootstrap.min.js"></script>
  <script src="../assets/js/fonts/custom-font.js"></script>
  <script src="../assets/js/pcoded.js"></script>
  <script src="../assets/js/plugins/feather.min.js"></script>
  <script>
    layout_change('light');
    change_box_container('false');
    layout_rtl_change('false');
    preset_change("preset-1");
    font_change("Public-Sans");
  </script>
</body>
</html>
