<html>
<head>
    <title>SIM PENDUDUK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #dcd2d2;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #333;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }
        .sidebar h1 {
            color: #8bc34a;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .sidebar a.active {
            background-color: #575757;
            font-weight: bold;
        }
        .sidebar a.active::before {
            content: '';
            display: inline-block;
            width: 5px;
            height: 100%;
            background-color: white;
            position: absolute;
            left: 0;
            top: 0;
        }
        .content {
            margin-left: 200px;
            padding: 20px;
        }
        .header {
            background-color: #8bc34a;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .user-info {
            display: flex;
            align-items: center;
        }
        .header .user-info i {
            margin-right: 10px;
        }
        .header .user-info span {
            font-size: 18px;
            color: white;
        }
        .breadcrumb {
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .breadcrumb a {
            text-decoration: none;
            color: #007bff;
        }
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        .main-content {
            text-align: center;
        }
        .main-content h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 200px;
            padding: 20px;
            text-align: center;
        }
        .card i {
            font-size: 40px;
            margin-bottom: 10px;
        }
        .card .title {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .card .number {
            font-size: 24px;
            font-weight: bold;
        }
        .card.blue {
            background-color: #007bff;
            color: white;
        }
        .card.green {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>SIM PENDUDUK</h1>
        <a href="#" class="active">Dashboard</a>
        <a href="#">Penduduk</a>
        <a href="/Desa">Desa</a>
        <a href="#">Bantuan</a>
        <a href="#">Data Pengguna</a>
        <a href="#">Dokumentasi</a>
        <a href="#">Histori</a>
        <a href="#">Pengaturan</a>
    </div>
    <div class="content">
        <div class="header">
            <div class="user-info">
                <i class="fas fa-user-circle"></i>
                <span>Admin</span>
            </div>
        </div>
        <div class="breadcrumb">
            <a href="#">Dashboard</a>
        </div>
        <div class="main-content">
            <h2>Sistem Informasi Pendataan Masyarakat Miskin di Kecamatan Batu Ampar</h2>
            <div class="cards">
                <div class="card blue">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="title">Desa</div>
                    <div class="number">14</div>
                </div>
                <div class="card green">
                    <i class="fas fa-users"></i>
                    <div class="title">Warga</div>
                    <div class="number">200</div>
                </div>
                <div class="card blue">
                    <i class="fas fa-hand-holding-usd"></i>
                    <div class="title">Bantuan</div>
                    <div class="number">7</div>
                </div>
                <div class="card green">
                    <i class="fas fa-clipboard-check"></i>
                    <div class="title">Status Penerima</div>
                    <div class="number">55</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>