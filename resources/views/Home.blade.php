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

        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #31363F;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #575757;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="title">SIM PENDUDUK</div>
        <div class="user" style="position: relative;">
            <a href="#" onclick="toggleDropdown()" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <i class="fas fa-user-circle" style="margin-right: 5px;"></i>
                <span>{{ Auth::user()->name }}</span> <!-- Menampilkan nama user yang sedang login -->
            </a>

            <!-- Dropdown Menu -->
            <div id="dropdown-menu" style="display: none; position: absolute; top: 30px; right: 0; background-color: #fff; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 150px; z-index: 1000;">
                <a href="{{ route('profile.edit') }}" style="display: block; padding: 10px; text-decoration: none; color: #333; font-size: 14px;">Edit Profil</a>
                <a href="{{ route('profile.view') }}" style="display: block; padding: 10px; text-decoration: none; color: #333; font-size: 14px;">Lihat Profil</a>
            </div>
        </div>

    </div>
    <div class="sidebar">
        <a href="/Home" class="active">Dashboard</a>
        <a href="/penduduk">Penduduk</a>
        <a href="/desa">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="/histori">Histori</a>
        <!-- Dropdown for Logout -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">Logout :</a>
            <div class="dropdown-content">
                <a href="{{ route('logout.google') }}" onclick="event.preventDefault(); document.getElementById('logout-google-form').submit();">Logout Google</a>
                <form id="logout-google-form" method="GET" action="{{ route('logout.google') }}" style="display:none;">
                    @csrf
                </form>
                <a href="/login" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" method="POST" action="/logout" style="display:none;">
                    @csrf
                </form>
            </div>
        </div>

        <script>
            function confirmLogout() {
                if (confirm("Apakah Anda yakin ingin logout?")) {
                    document.getElementById('logout-form').submit();
                }
            }
        </script>
    </div>
    <div class="content">
        <div class="breadcrumb">
            <a href="/Home">Dashboard</a>
        </div>
        <div class="main-title">Sistem Informasi Pendataan Masyarakat Miskin di Kecamatan Batu Ampar</div>
        <div class="cards">
            <div class="card green">
                <i class="fas fa-map-marker-alt"></i>
                <div class="info">
                    <div class="title">Desa</div>
                    <div class="number">14</div>
                    <a href="/Desa" class="detail-link">Lihat Detail ></a>
                </div>
            </div>
            <div class="card blue">
                <i class="fas fa-users"></i>
                <div class="info">
                    <div class="title">Warga</div>
                    <div class="number">200</div>
                </div>
                <a href="/penduduks" class="detail-link">Lihat Detail ></a>
            </div>
            <div class="card green">
                <i class="fas fa-hand-holding-usd"></i>
                <div class="info">
                    <div class="title">Bantuan</div>
                    <div class="number">50</div>
                </div>
                <a href="/bantuans" class="detail-link">Lihat Detail ></a>
            </div>
            <div class="card blue">
                <i class="fas fa-clipboard-check"></i>
                <div class="info">
                    <div class="title">Status Penerima</div>
                    <div class="number">55</div>
                </div>
                <a href="/Histori" class="detail-link">Lihat Detail ></a>
            </div>
            <div class="card green">
                 <i class="fab fa-whatsapp"></i>
                <div class="info">
                    <div class="title">Whatsapp</div>
                </div>
                <a href="/send-message" class="detail-link">Lihat Detail ></a>
            </div>
        </div>
    </div>
</body>
<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
    }

    // Tutup dropdown jika pengguna mengklik di luar dropdown
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown-menu');
        const user = document.querySelector('.user');

        if (!user.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>


</html>
