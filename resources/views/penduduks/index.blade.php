<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM PENDUDUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            background-color: #333;
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
        <a href="#" class="active">Dashboard</a>
        <a href="#">Penduduk</a>
        <a href="/Desa">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="#">Histori</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LogOut</a>
        <form id="logout-form" method="POST" action="/logout" style="display:none;">
            @csrf
        </form>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Penduduk</h4>
                    </div>
                    <div class="col-md-12 text-end">
                        <a href="{{ route('penduduks.create') }}" class="btn btn-success">Tambah Penduduk</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nik</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Alamat</th>
                            <th>Jenis Bantuan</th>
                            <th>Nominal</th>
                            <th>Status Bantuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penduduks as $penduduk)
                        <tr>
                            <td>{{ $penduduk->id }}</td>
                            <td>{{ $penduduk->nama }}</td>
                            <td>{{ $penduduk->nik }}</td>
                            <td>{{ $penduduk->kecamatan }}</td>
                            <td>{{ $penduduk->kelurahan }}</td>
                            <td>{{ $penduduk->alamat }}</td>
                            <td>{{ $penduduk->jenis_bantuan }}</td>
                            <td>{{ $penduduk->nominal }}</td>
                            <td>{{ $penduduk->status_bantuan }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('penduduks.show', $penduduk->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('penduduks.edit', $penduduk->id) }}" class="btn btn-info">Edit</a>
                                    <form method="POST" action="{{ route('penduduks.destroy', $penduduk->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $penduduks->links() }}
            </div>
        </div>
    </div>
</body>

</html>