<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIM PENDUDUK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
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
            padding-right: 18px;
        }

        .header .user-info i {
            margin-right: 10px;
        }

        .header .user-info span {
            font-size: 18px;
            color: white;
        }

        .sidebar {
            width: 200px;
            background-color: #31363F;
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

        .main-content {
            margin-left: 220px;
            padding-top: 70px;
            /* Adjusted for header height */
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

        .button-item {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: none;
            width: 100%;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
        }

        .button-item:hover {
            background-color: #45a049;
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
        <a href="/penduduk"> <i class="fas fa-users"></i> Penduduk</a>
        <a href="/desa" class="active"> <i class="fas fa-map-marker-alt"></i> Desa</a>
        <a href="/bantuans"> <i class="fas fa-hand-holding-usd"></i> Bantuan</a>
        <a href="/dokumentasi"> <i class="fas fa-camera"></i>  Dokumentasi</a>
        <a href="/histori"> <i class="fas fa-history"></i> Histori</a>
        <!-- Dropdown for Logout -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle"> <i class="fas fa-sign-out-alt"></i>  Logout :</a>
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
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="breadcrumb-custom">
            <a href="/desa">Desa</a>
        </div>
        <div class="page-title">
            Data Desa
        </div>

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <a href="{{ route('desa.create') }}" class="btn btn-md btn-success mb-3"> <i class="fas fa-plus"></i> Tambah Desa</a>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Desa</th>
                                <th>Jumlah Penduduk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desa as $d)
                                <tr>
                                    <td>{{ $d->nama_desa }}</td>
                                    <td>{{ $d->penduduk_count }}</td>
                                    <td>
                                        <a href="{{ route('desa.show', $d->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('desa.edit', $d->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('desa.destroy', $d->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>