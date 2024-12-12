<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #fff;
            background: url('/images/KantorKecamatan.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 50px 20px;
            min-height: 100vh;
        }

        .header .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        .header .title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .header .subtitle {
            font-size: 18px;
            font-style: italic;
            margin: 10px 0;
        }

        .button-section {
            margin-top: 20px;
        }

        .button-section .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            color: #4caf50;
            background-color: #ffffff;
            border: 2px solid #ffffff;
            transition: all 0.3s ease;
        }

        .button-section .btn:hover {
            background-color: #4caf50;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <img src="/images/logobatuampar.png" alt="Logo Kecamatan Batu Ampar" class="logo">
            <h1 class="title">Selamat Datang di Website</h1>
            <h2 class="subtitle">Sistem Informasi Pendataan Masyarakat Miskin di Kecamatan Batu Ampar</h2>
        </header>

        <div class="button-section">
            <a href="/login" class="btn btn-login">Login</a>
            <a href="/register" class="btn btn-register">Register</a>
        </div>
    </div>
    
</body>
</html>
