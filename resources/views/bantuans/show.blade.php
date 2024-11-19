<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Bantuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Prevent horizontal scrolling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: lightgray;
            overflow-x: hidden;
        }

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

        .header .user-info {
            display: flex;
            align-items: center;
        }

        .header .user-info i {
            margin-right: 5px;
        }

        .header .user-info span {
            font-size: 18px;
            color: white;
        }

        .sidebar {
            background-color: #333;
            color: white;
            width: 200px; /* Lebar sidebar */
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

        .sidebar a:hover {
            background-color: #575757;
        }

        .sidebar a.active {
            background-color: #575757;
            border-left: 4px solid #4CAF50;
            padding-left: 16px;
        }

        .container {
            margin-left: 220px; /* Menyesuaikan jarak sidebar dengan konten */
            padding-top: 50px; /* Menyesuaikan jarak konten dengan header */
            padding-bottom: 50px;
            max-width: calc(100% - 240px); /* Pastikan konten tetap di dalam layar */
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
            font-size: 20px;
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
            <span>User</span>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/Home">Dashboard</a>
        <a href="#">Penduduk</a>
        <a href="/Desa">Desa</a>
        <a href="/bantuans" class="active">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="#">Histori</a>
        <a href="#">LogOut</a>
    </div>

    <!-- Main Content -->
    <div class="container mt-5 mb-5">
        <!-- Custom Breadcrumb -->
        <div class="breadcrumb-custom">
            <a href="/bantuans">Bantuan</a>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/bantuans/'.$bantuan->image) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $bantuan->title }}</h3>
                        <hr/>
                        <p>{{ "Rp " . number_format($bantuan->price, 2, ',', '.') }}</p>
                        <code>
                            <p>{!! $bantuan->description !!}</p>
                        </code>
                        <hr/>
                        <p>Stock : {{ $bantuan->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
