<html>
<head>
    <title>SIM PENDUDUK</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: green;
            background-size: cover;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            color: gray;
        }
        .title span {
            color: green;
        }
        .subtitle {
            font-size: 14px;
            color: gray;
            margin-bottom: 20px;
        }
        .input-container {
            margin-bottom: 20px;
        }
        .input-container input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-bottom: 1px solid gray;
            font-size: 16px;
        }
        .login-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">SIM <span>PENDUDUK</span></div>
        <div class="subtitle">Sistem Informasi Pendataan Penduduk Miskin<br>(Kecamatan Batu Ampar) Berbasis Website</div>
        <div class="input-container">
            <input type="email" placeholder="Email/Username">
        </div>
        <div class="input-container">
            <input type="password" placeholder="Password">
        </div>
        <button class="login-button" href="home.blade.php">Login</button>
    </div>
</body>
</html>