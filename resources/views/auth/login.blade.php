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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center; /* Supaya teks di atas juga terpusat */
        }

        .container h1 {
            font-size: 30px;
            margin-bottom: 10px;
            color: white;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
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

        .login-box button:hover {
            background-color: darkgreen;
        }
    </style>
</head>

<body>
    <div class="container">
       
        <h1>Sistem Informasi Pendataan Penduduk Miskin<br>(Kecamatan Batu Ampar)</h1>

        <div class="login-box">
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
            <form method="POST" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <button type="button" onclick="window.location='{{ route('register') }}'">Register</button>
            </form>
        </div>
    </div>
</body>

</html>
