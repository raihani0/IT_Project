<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIM Penduduk</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('/images/KantorKecamatan.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        .login-box h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: green;
        }
        .login-box p {
            font-size: 14px;
            color: gray;
            margin-bottom: 20px;
        }
        .login-box input[type="email"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-box button {
            width: 48%;
            padding: 10px;
            margin: 5px 1%;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .login-box button:hover {
            background-color: darkgreen;
        }
        .google-login {
            background-color: #4285F4;
            color: white;
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
        }
        .google-login:hover {
            background-color: #3367D6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>SIM <span style="color: green;">PENDUDUK</span></h1>
            <p>Sistem Informasi Pendataan Penduduk Miskin<br>(Kecamatan Batu Ampar) Berbasis Website</p>
            @if ($errors->any())
                <div>
                    <ul style="color: red; text-align: left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <button type="button" class="google-login" onclick="window.location='{{ route('google.login') }}'">
                    Login dengan Google
                </button>
            </form>
            <p><a href="{{ route('register') }}">Belum punya akun? Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>
