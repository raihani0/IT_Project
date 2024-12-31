<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM PENDUDUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .breadcrumb {
            background-color: white;
            padding: 9px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #0d6efd;
            text-decoration: none;
        }

        .content {
            margin-left: 200px;
            padding: 90px 30px 30px 30px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }

        .form-container label {
            font-weight: normal;
        }

        .form-container .form-control {
            margin-bottom: 15px;
        }

        .form-container button {
            width: 100%;
        }

        .form-section {
            margin-bottom: 15px;
        }

        .form-section .row {
            margin-bottom: 10px;
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
        <div class="user">
            <i class="fas fa-user-circle"></i>
            <span>{{ Auth::user()->name }}</span> <!-- Menampilkan nama user yang sedang login -->
        </div>
    </div>

    <div class="sidebar">
        <a href="/Home"> <i class="fas fa-home"></i> Dashboard</a>
        <a href="/penduduk" class="active"> <i class="fas fa-users"></i> Penduduk</a>
        <a href="/desa"> <i class="fas fa-map-marker-alt"></i> Desa</a>
        <a href="/bantuans"> <i class="fas fa-hand-holding-usd"></i> Bantuan</a>
        <a href="/Dokumentasi"> <i class="fas fa-camera"></i>  Dokumentasi</a>
        <a href="/histori"> <i class="fas fa-history"></i> Histori</a>
        <!-- Dropdown for Logout -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle"> <i class="fas fa-sign-out-alt"></i> Logout :</a>
            <div class="dropdown-content">
                <a href="{{ route('logout.google') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-google-form').submit();">Logout
                    Google</a>
                <form id="logout-google-form" method="GET" action="{{ route('logout.google') }}" style="display:none;">
                    @csrf
                </form>
                <a href="/login"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
            <a href="/penduduk">Penduduk</a>
        </div>
        <div class="form-container">
            <h1 class="text-center">Tambah Data Penduduk</h1>
            <form action="{{ route('penduduk.store') }}" method="POST">
                @csrf
                <div class="form-section">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-section">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="form-section">
                    <label for="desa_id" class="form-label">Desa</label>
                    <select class="form-control" id="desa_id" name="desa_id" required>
                        <option value="">Pilih Desa</option>
                        @foreach ($desa as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_desa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-section">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                </div>
                <div class="form-section">
                    <label for="jenis_bantuan" class="form-label">Jenis Bantuan</label>
                    <input type="text" class="form-control" id="jenis_bantuan" name="jenis_bantuan" required>
                </div>
                <div class="form-section">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="number" class="form-control" id="nominal" name="nominal" required>
                </div>
                <div class="form-section">
                    <label for="status_bantuan" class="form-label">Status Bantuan</label>
                    <select class="form-control" id="status_bantuan" name="status_bantuan" required>
                        <option value="Sudah Menerima">Sudah Menerima</option>
                        <option value="Belum Menerima">Belum Menerima</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>