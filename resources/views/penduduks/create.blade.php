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
        <a href="/Home">Dashboard</a>
        <a href="/penduduks" class="active">Penduduk</a>
        <a href="/desa">Desa</a>
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

    <div class="content">
        <div class="breadcrumb">
            <a href="/penduduks">Penduduk</a>
        </div>
        <div class="form-container">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h4>Tambah Penduduk</h4>
                        </div>
                        <div class="col-md-3 text-end">
                            <a href="{{ route('penduduks.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('penduduks.store') }}">
                        @csrf
                        <div class="form-section">
                            <label for="nama">Nama:</label>
                            <input type="text" id="nama" name="nama" class="form-control" required maxlength="255">
                        </div>
                        <div class="form-section">
                            <label for="nik">NIK:</label>
                            <input type="text" id="nik" class="form-control" name="nik" required maxlength="16" minlength="16" pattern="\d+">
                        </div>
                        <div class="form-section">
                            <label for="desa">Desa:</label>
                            <input type="text" id="desa" class="form-control" name="desa" required maxlength="255">
                        </div>
                        <div class="form-section">
                            <label for="alamat">Alamat:</label>
                            <textarea id="alamat" class="form-control" name="alamat" required maxlength="255"></textarea>
                        </div>
                        <div class="form-section">
                            <label for="jenis_bantuan">Jenis Bantuan:</label>
                            <input type="text" id="jenis_bantuan" class="form-control" name="jenis_bantuan" required maxlength="100">
                        </div>
                        <div class="form-section">
                            <label for="nominal">Nominal:</label>
                            <input type="number" id="nominal" class="form-control" name="nominal" required min="0" step="0.01">
                        </div>
                        <div class="form-section">
                            <label for="status_bantuan">Status Bantuan:</label>
                            <select id="status_bantuan" class="form-control" name="status_bantuan" required>
                                <option value="1">Sudah Menerima</option>
                                <option value="0">Belum Menerima</option>
                            </select>
                        </div>
                        <div class="form-section">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
