<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Bantuan</title>
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
            background-color: #333;
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
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>SIM PENDUDUK</h1>
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span>Admin</span>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/Home">Dashboard</a>
        <a href="/penduduks">Penduduk</a>
        <a href="/Desa">Desa</a>
        <a href="/bantuans" class="active">Bantuan</a>
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
    <div class="container mt-5">
        <!-- Breadcrumb -->
        <div class="breadcrumb-custom">
            <a href="/bantuans">Bantuan</a> / Detail
        </div>

        <!-- Page Title -->
        <div class="page-title">
            Detail Bantuan
        </div>

        <!-- Bantuan Details -->
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="mb-3">{{ $bantuan->title }}</h3>
                        <hr/>
                        <div class="mb-3">
                            <strong>Status:</strong>
                            <span class="badge bg-{{ $bantuan->status ? 'success' : 'danger' }}">
                                {{ $bantuan->status ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <strong>Deskripsi Bantuan:</strong>
                            <p>{{ $bantuan->description }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('bantuans.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('bantuans.edit', $bantuan->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('bantuans.destroy', $bantuan->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bantuan ini?');">
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
