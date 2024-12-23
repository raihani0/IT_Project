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
            padding: 6px 20px;
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
            padding: 7px 15px;
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
            background: lightgray;
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

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .page-title {
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .badge-status {
            font-size: 14px;
            padding: 5px 10px;
        }

        .btn-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
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
            <span>{{ Auth::user()->name }}</span>
        </div>
    </div>

    <div class="sidebar">
        <a href="/Home">Dashboard</a>
        <a href="/penduduk" class="active">Penduduk</a>
        <a href="/desa">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="/histori">Histori</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">Logout :</a>
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

    <div class="content">
        <div class="breadcrumb">
            <a href="/penduduk">Penduduk</a>
        </div>
        <div class="page-title">Data Penduduk</div>

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="btn-container">
                        <a href="{{ route('penduduk.create') }}" class="btn btn-md btn-success">Tambah Penduduk</a>
                        <a href="{{ url('pdf_generator') }}" class="btn btn-primary">Download PDF</a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Desa</th>
                                <th>Alamat</th>
                                <th>Jenis Bantuan</th>
                                <th>Nominal</th>
                                <th>Status Bantuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penduduk as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->desa->nama_desa }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jenis_bantuan }}</td>
                                    <td>{{ number_format($item->nominal, 2) }}</td>
                                    <td>
                                        @if($item->status_bantuan == 'Sudah Menerima')
                                            <span class="badge bg-success badge-status">{{ $item->status_bantuan }}</span>
                                        @else
                                            <span class="badge bg-danger badge-status">{{ $item->status_bantuan }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('penduduk.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('penduduk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('penduduk.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')">Hapus</button>
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
</body>

</html>
