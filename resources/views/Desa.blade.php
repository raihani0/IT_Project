<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIM PENDUDUK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: lightgray;
            overflow-x: hidden;
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
            font-weight: bold;
        }

        .header .user-info {
            display: flex;
            align-items: center;
            padding-right: 20px;
        }

        .header .user-info i {
            margin-right: 5px;
        }

        .header .user-info span {
            font-size: 18px;
            color: white;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            position: fixed;
            top: 50px; /* Beri jarak dari header */
            bottom: 0;
            padding-top: 20px; /* Jarak di dalam sidebar */
            font-size: 16px;
        }

        .sidebar a {
            padding: 7px 15px;
            text-decoration: none;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .sidebar a.active {
            background-color: #575757;
            border-left: 4px solid #4CAF50;
            padding-left: 16px;
        }

        .main-content {
            margin-left: 220px;
            padding-top: 70px; /* Adjusted for header height */
            padding-bottom: 50px;
            max-width: calc(100% - 240px);
        }

        .breadcrumb-custom {
            background-color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .breadcrumb-custom a {
            text-decoration: none;
            color: #0d6efd;
        }

        .breadcrumb-custom a:hover {
            text-decoration: underline;
        }

        .button-item {
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

        .button-item:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <h1>SIM PENDUDUK</h1>
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span>User</span>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/Home">Dashboard</a>
        <a href="/penduduks">Penduduk</a>
        <a href="/Desa" class="active">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="/histori">Histori</a>
        <a href="#" onclick="confirmLogout()">LogOut</a>
        <form id="logout-form" method="POST" action="/logout" style="display:none;">
            @csrf
        </form>

        <script>
            function confirmLogout() {
                if (confirm("Apakah Anda yakin ingin logout?")) {
                    document.getElementById('logout-form').submit();
                }
            }
        </script>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Breadcrumb -->
        <div class="breadcrumb-custom">
            <a href="/Desa">Desa</a> 
        </div>

        <!-- Desa List Buttons -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
