<html>

<head>
    <title>SIM PENDUDUK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #D3D3D3;
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
            left: 0;
            right: 0;
            z-index: 1;
            /* Pastikan header di atas sidebar */
        }

        .header .title {
            font-size: 24px;
            font-weight: bold;
        }

        .header .user {
            display: flex;
            align-items: center;
            font-size: 18px;
        }

        .header .user i {
            margin-right: 10px;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            position: fixed;
            top: 50px;
            /* Beri jarak dari header */
            bottom: 0;
            padding-top: 20px;
            /* Jarak di dalam sidebar */
            font-size: 16px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #575757;
        }

        .sidebar a.active {
            border-left: 4px solid #4CAF50;
            padding-left: 16px;
        }

        .content {
            margin-left: 200px;
            padding: 90px 30px 30px 30px;
            /* Tambahkan padding top untuk content */
        }

        .breadcrumb {
            background-color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #0d6efd;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .main-title {
            font-size: 22px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 20px;
            margin: 10px;
            width: 180px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card i {
            font-size: 36px;
            margin-right: 15px;
        }

        .card.blue i {
            color: #007bff;
        }

        .card.green i {
            color: #28a745;
        }

        .card .info {
            text-align: left;
        }

        .card .info .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card .info .number {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="title">SIM PENDUDUK</div>
        <div class="user">
            <i class="fas fa-user-circle"></i>
            <span>Admin</span>
        </div>
    </div>
    <div class="sidebar">
        <a href="/Home" class="active">Dashboard</a>
        <a href="/penduduks">Penduduk</a>
        <a href="/Desa">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
<<<<<<< HEAD

        <a href="/histori">Histori</a>
=======
        <a href="/Histori">Histori</a>
>>>>>>> d3ed055d14819802f0f8f3d9df3f1453893a0ed8
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LogOut</a>
        <form id="logout-form" method="POST" action="/logout" style="display:none;">
            @csrf
        </form>

    </div>
    <div class="content">
        <div class="breadcrumb">
            <a href="/Home">Dashboard</a>
        </div>
        <div class="main-title">Sistem Informasi Pendataan Masyarakat Miskin di Kecamatan Batu Ampar</div>
        <div class="cards">
            <div class="card blue">
                <i class="fas fa-map-marker-alt"></i>
                <div class="info">
                    <div class="title">Desa</div>
                    <div class="number">14</div>
                </div>
            </div>
            <div class="card green">
                <i class="fas fa-users"></i>
                <div class="info">
                    <div class="title">Warga</div>
                    <div class="number">200</div>
                </div>
            </div>
            <div class="card blue">
                <i class="fas fa-hand-holding-usd"></i>
                <div class="info">
                    <div class="title">Bantuan</div>
                    <div class="number">7</div>
                </div>
            </div>
            <div class="card green">
                <i class="fas fa-clipboard-check"></i>
                <div class="info">
                    <div class="title">Status Penerima</div>
                    <div class="number">55</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>