<!DOCTYPE html>
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
        }

        .login-container {
            /* background: rgba(255, 255, 255, 0.1); */
            background-color: white;
            color: #006699;
            padding: 30px;
            border-radius: 15px;
            /* text-align: center; */
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
            color: #006699 !important;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        .form-control::placeholder {
            /* color: rgba(255, 255, 255, 0.7); */
            color: #006699;
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
            color:#006699;
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
