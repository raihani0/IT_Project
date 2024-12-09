<!DOCTYPE html>
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
            background-color: #31363F;
            color: white;
            position: fixed;
            top: 50px;
            bottom: 0;
            padding-top: 20px;
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
        }

        .breadcrumb {
            background-color: white;
            padding: 11px 15px;
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
            flex-direction: column;
            padding: 20px;
            margin: 10px;
            width: 200px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card i {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .card.blue i {
            color: #007bff;
        }

        .card.green i {
            color: #28a745;
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

        .detail-link {
            margin-top: 10px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .detail-link:hover {
            text-decoration: underline;
        }

        .card.whatsapp {
            background-color: #25D366;
            color: white;
        }

        .card.whatsapp i {
            color: white;
            margin-top: 10px; /* Tambahkan margin atas */
        }

        .card.whatsapp .info .title {
            font-size: 18px;
        }

        .card.whatsapp .info .number {
            font-size: 18px;
            color: white;
        }

        .card.whatsapp:hover {
            background-color: #128C7E;
        }

        .caption {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
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
        <a href="/Histori">Histori</a>
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
                    <a href="/Desa" class="detail-link">Lihat Detail ></a>
                </div>
            </div>
            <div class="card green">
                <i class="fas fa-users"></i>
                <div class="info">
                    <div class="title">Warga</div>
                    <div class="number">200</div>
                </div>
                <a href="/penduduks" class="detail-link">Lihat Detail ></a>
            </div>
            <div class="card blue">
                <i class="fas fa-hand-holding-usd"></i>
                <div class="info">
                    <div class="title">Bantuan</div>
                    <div class="number">7</div>
                </div>
                <a href="/bantuans" class="detail-link">Lihat Detail ></a>
            </div>
            <div class="card green">
                <i class="fas fa-clipboard-check"></i>
                <div class="info">
                    <div class="title">Status Penerima</div>
                    <div class="number">55</div>
                </div>
                <a href="/Histori" class="detail-link">Lihat Detail ></a>
            </div>
            <div class="card whatsapp">
                <a href="https://wa.me/6281234567890" target="_blank" style="color: white; text-decoration: none; display: flex; align-items: center; text-align: center; flex-direction: column;">
                    <i class="fab fa-whatsapp"></i>
                    <div class="title">Contact Us</div>
                    <div class="number">WhatsApp</div>
                </a>
            </div>
        </div>
        <div class="caption">
            IT Project Kelompok 5
        </div>
    </div>
</body>

</html>
