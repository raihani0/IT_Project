<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .sidebar a.active {
            border-left: 4px solid #4CAF50;
            padding-left: 16px;
        }

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

        .desa-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .desa-box {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            box-sizing: border-box;
            position: relative;
        }

        .desa-box h2 {
            margin-bottom: 15px;
            color: #333;
            font-size: 18px;
            display: inline-block;
            cursor: pointer;
        }

        .toggle-icon {
            margin-left: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.3s;
        }

        .desa-content {
            display: none;
            margin-top: 10px;
        }

        .desa-box.open .desa-content {
            display: block;
        }

        .desa-box.open .toggle-icon {
            transform: rotate(180deg);
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 10px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .card-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
        }

        .actions a,
        .actions button {
            padding: 8px 12px;
            margin: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .actions a:hover,
        .actions button:hover {
            background-color: #45a049;
        }

        .btn-add {
            display: inline-block;
            padding: 10px 15px;
            background-color: #2196F3;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

        .btn-add:hover {
            background-color: #1976D2;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #2196F3;
            text-decoration: none;
            font-size: 16px;
        }

        .data-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            /* Centering the title */
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="title">SIM PENDUDUK</div>
        <div class="user">
            <i class="fas fa-user-circle"></i>
            <span>{{ Auth::user()->name }}</span>
        </div>
    </div>
    <div class="sidebar">
        <a href="/Home"> <i class="fas fa-home"></i> Dashboard</a>
        <a href="/penduduk"> <i class="fas fa-users"></i> Penduduk</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle"><i class="fas fa-calculator"></i> SAW :</a>
            <div class="dropdown-content">
                <a href="/kriteria">Kriteria</a>
                <a href="/alternatif">Alternatif</a>
                <a href="/hitung">Hitung</a>
            </div>
        </div>
        <a href="/desa"> <i class="fas fa-map-marker-alt"></i> Desa</a>
        <a href="/bantuans"> <i class="fas fa-hand-holding-usd"></i> Bantuan</a>
        <a href="/dokumentasi" class="active"> <i class="fas fa-camera"></i> Dokumentasi</a>
        <a href="/histori"> <i class="fas fa-history"></i> Histori</a>
        <!-- Dropdown for Logout -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">
                <i class="fas fa-sign-out-alt"></i> Logout :
            </a>
            <div class="dropdown-content">
                <a href="{{ route('logout.google') }}" onclick="event.preventDefault(); 
                    if(confirm('Apakah Anda yakin ingin logout dengan Google?')) { 
                        document.getElementById('logout-google-form').submit(); }"> Logout Google
                </a>
                <form id="logout-google-form" method="GET" action="{{ route('logout.google') }}" style="display:none;">
                    @csrf
                </form>
                <a href="/login" onclick="event.preventDefault(); 
                    if(confirm('Apakah Anda yakin ingin logout?')) { 
                        document.getElementById('logout-form').submit(); }"> Logout
                </a>
                <form id="logout-form" method="POST" action="/logout" style="display:none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="breadcrumb">
            <a href="/dokumentasi">Dokumentasi</a>
        </div>

        <div class="data-title">Data Dokumentasi</div> <!-- Menambahkan judul Data Dokumentasi yang di-center-kan -->

        <div class="desa-container">
            @foreach (['Ambawang', 'Batu Ampar', 'Bluru', 'Damar Lima', 'Damit', 'Damit Hulu', 'Durian Bungkuk', 'Gunung Mas', 'Gunung Melati', 'Jilatan', 'Jilan Alur', 'Pantai Linuh', 'Tajau Mulya', 'Tajau Pecah'] as $desa)
                <div class="desa-box">
                    <h2 onclick="toggleContent(this)">{{ $desa }}
                        <span class="toggle-icon">&#9660;</span>
                    </h2>
                    <div class="desa-content">
                        @foreach ($dokumentasi->where('desa', $desa) as $dokumentasi)
                            <div class="card">
                                <p class="card-title">{{ $dokumentasi->title }}</p>
                                <img src="{{ asset('storage/' . $dokumentasi->image_path) }}" alt="{{ $dokumentasi->title }}">
                                <div class="actions">
                                    <a href="{{ route('dokumentasi.show', $dokumentasi->id) }}" class="btn"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('dokumentasi.edit', $dokumentasi->id) }}" class="btn"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('dokumentasi.destroy', $dokumentasi->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" onclick="return confirm('Yakin Hapus?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('dokumentasi.create') }}?desa={{ $desa }}" class="btn-add">Tambah Dokumentasi</a>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function toggleContent(element) {
            var desaBox = element.closest('.desa-box');
            desaBox.classList.toggle('open');
        }
    </script>
</body>

</html>