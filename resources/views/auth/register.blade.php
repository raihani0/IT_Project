<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SIM Penduduk</title>
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
        .register-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
        .register-box h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: green;
        }
        .register-box p {
            font-size: 14px;
            color: gray;
            margin-bottom: 20px;
        }
        .register-box input[type="text"],
        .register-box input[type="email"],
        .register-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .register-box button {
            width: 38%;
            padding: 10px;
            margin: 5px 1%;
            border: none;
            border-radius: 15px;
            background-color: green;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .register-box button:hover {
            background-color: darkgreen;
        }
        .register-box a {
            display: block;
            margin-top: 10px;
            color: green;
            text-decoration: none;
        }
        .register-box a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-box">
            <p>Sistem Informasi Pendataan Penduduk Miskin<br>(Kecamatan Batu Ampar)</p>
            <img src="/images/logobatuampar.png" alt="Logo SIM Penduduk"
                style="width: 200px; height: auto; margin-bottom: 10px;">
            @if ($errors->any())
                <div>
                    <ul style="color: red; text-align: left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/register">
                @csrf
                <input type="text" name="name" placeholder="Nama Lengkap" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                <button type="submit">Register</button>
            </form>
            <p><a href="{{ route('login') }}">Sudah punya akun? Login di sini</a></p>
        </div>
    </div>
</body>
</html>
