<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: lightgray;
            overflow-x: hidden;
        }

        /* Header Styling */
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info i {
            font-size: 16px;
            color: white;
        }

        .user-info span {
            font-size: 16px;
            font-weight: bold;
            color: white;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #31363F;
            color: white;
            width: 200px;
            position: fixed;
            top: 50px;
            left: 0;
            bottom: 0;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar a {
            padding: 7px 15px;
            text-decoration: none;
            color: white;
            display: block;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #575757;
        }

        .sidebar a.active {
            border-left: 4px solid #4CAF50;
            padding-left: 16px;
        }

        /* Main Content Styling */
        .container {
            margin-left: 220px;
            padding-top: 70px;
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

        .page-title {
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Card Styling */
        .card-body h3 {
            font-size: 24px;
            font-weight: bold;
        }

        .card-body .mb-3 {
            font-size: 16px;
        }

        .card-body .badge {
            font-size: 14px;
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
    <!-- Header -->
    <div class="header">
        <h1>SIM PENDUDUK</h1>
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span>{{ Auth::user()->name }}</span> <!-- Menampilkan nama user yang sedang login -->
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/Home"> <i class="fas fa-home"></i> Dashboard</a>
        <a href="/penduduk" class="active"> <i class="fas fa-users"></i> Penduduk</a>
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
        <a href="/dokumentasi"> <i class="fas fa-camera"></i>  Dokumentasi</a>
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

    <!-- Main Content -->
    <div class="container mt-5">
        <!-- Breadcrumb -->
        <div class="breadcrumb-custom">
            <a href="/penduduk">Penduduk</a>
        </div>

        <!-- Page Title -->
        <div class="page-title">
            Detail Penduduk
        </div>

        <!-- Penduduk Details -->
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="mb-3">{{ $penduduk->nama }}</h3>
                        <hr/>
                        <div class="mb-3">
                            <strong>ID:</strong> {{ $penduduk->id }}
                        </div>
                        <div class="mb-3">
                            <strong>NIK:</strong> {{ $penduduk->nik }}
                        </div>
                        <div class="mb-3">
                            <strong>Desa:</strong> {{ $penduduk->desa }}
                        </div>
                        <div class="mb-3">
                            <strong>Alamat:</strong> {{ $penduduk->alamat }}
                        </div>
                        <div class="mb-3">
                            <strong>Jenis Bantuan:</strong> {{ $penduduk->jenis_bantuan }}
                        </div>
                        <div class="mb-3">
                            <strong>Nominal Bantuan:</strong> {{ $penduduk->nominal }}
                        </div>
                        <div class="mb-3">
                            <strong>Status Bantuan:</strong> 
                            <span class="badge bg-{{ $penduduk->status_bantuan ? 'success' : 'danger' }}">
                                {{ $penduduk->status_bantuan ? 'Sudah Menerima' : 'Belum Menerima' }}
                            </span>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penduduk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
