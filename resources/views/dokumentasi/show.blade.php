<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumentasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
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

        .sidebar .dropdown {
            position: relative;
        }

        .sidebar .dropdown-content {
            display: none;
            position: absolute;
            left: 0;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
        }

        .sidebar .dropdown:hover .dropdown-content {
            display: block;
        }

        .sidebar .dropdown-content a {
            padding: 12px 16px;
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

        .detail-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        .detail-container h1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .document-detail img {
            max-width: 100%;
            border-radius: 8px;
        }

        .document-detail p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
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

        .back-link a:hover {
            text-decoration: underline;
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
        <a href="/Home" class="active">Dashboard</a>
        <a href="/penduduk">Penduduk</a>
        <a href="/desa">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="/histori">Histori</a>
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
    </div>

    <div class="content">
        <div class="breadcrumb">
            <a href="/Dokumentasi">Dokumentasi</a>
        </div>

        <div class="detail-container">
            <h1>Detail Dokumentasi</h1>
            <div class="document-detail">
                <h2>{{ $dokumentasi->title }}</h2>
                @if ($dokumentasi->image_path)
                <img src="{{ asset('storage/' . $dokumentasi->image_path) }}" alt="{{ $dokumentasi->title }}">
                @else
                <p>Gambar tidak tersedia.</p>
                @endif
                <p><strong>Desa:</strong> {{ $dokumentasi->desa }}</p>
                <p><strong>Tanggal Upload:</strong> {{ $dokumentasi->created_at->format('d M Y') }}</p>
            </div>

            <div class="back-link">
                <a href="{{ route('dokumentasi.index') }}">Kembali ke Daftar Dokumentasi</a>
            </div>
        </div>
    </div>
</body>

</html>