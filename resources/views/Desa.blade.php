<html>

<head>
    <title>SIM PENDUDUK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header .user-info {
            display: flex;
            align-items: center;
            padding-right: 20px;
            margin-right: 20px;
        }

        .header .user-info i {
            margin-right: 5px;
        }

        .header .user-info span {
            font-size: 18px;
            color: white;
        }

        .sidebar {
            background-color: #333;
            color: white;
            width: 200px;
            position: fixed;
            top: 50px;
            left: 0;
            bottom: 0;
            padding-top: 10px;
            overflow-y: auto;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .sidebar .active {
            background-color: #575757;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
        }

        .main-content {
            margin-left: 200px;
            padding: 80px 20px 20px;
            background-color: #E0E0E0;
            min-height: 100vh;
        }

        .main-content .breadcrumb {
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .main-content .breadcrumb a {
            color: #00712D;
            font-size: 20px;
            text-decoration: none;
        }

        .main-content .button-item {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: none;
            width: 100%;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
        }

        .main-content .button-item:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>SIM PENDUDUK</h1>
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span>Admin</span>
        </div>
    </div>
    <div class="sidebar">
        <a href="/Home">Dashboard</a>
        <a href="#">Penduduk</a>
        <a href="#" class="active">Desa</a>
        <a href="#">Bantuan</a>
        <a href="#">Data Pengguna</a>
        <a href="#">Dokumentasi</a>
        <a href="#">Histori</a>
    </div>
    <div class="main-content">
        <div class="breadcrumb">
            <a href="#">Desa</a>
        </div>
        <a href="/Ambawang"><button class="button-item">Ambawang</button></a>
        <a href="/BatuAmpar"><button class="button-item">Batu Ampar</button></a>
        <a href="/Bluru"><button class="button-item">Bluru</button></a>
        <a href="/DamarLima"><button class="button-item">Damar Lima</button></a>
        <a href="/Damit"><button class="button-item">Damit</button></a>
        <a href="/DamitHulu"><button class="button-item">Damit Hulu</button></a>
        <a href="/DurianBungkuk"><button class="button-item">Durian Bungkuk</button></a>
        <a href="/GunungMas"><button class="button-item">Gunung Mas</button></a>
        <a href="/GunungMelati"><button class="button-item">Gunung Melati</button></a>
        <a href="/Jilatan"><button class="button-item">Jilatan</button></a>
        <a href="/JilatanAlur"><button class="button-item">Jilatan Alur</button></a>
        <a href="/PantaiLinuh"><button class="button-item">Pantai Linuh</button></a>
        <a href="/TajauMulya"><button class="button-item">Tajau Mulya</button></a>
        <a href="/TajauPecah"><button class="button-item">Tajau Pecah</button></a>
    </div>
</body>

</html>