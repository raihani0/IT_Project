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
            max-width: 1200px; /* Membatasi lebar konten agar lebih rapi */
            margin-right: auto; /* Menjaga agar konten rata tengah */
        }

        .card {
            max-width: 900px; /* Membatasi lebar card */
            margin: auto; /* Membuat card berada di tengah */
            padding: 20px; /* Memberikan padding di dalam card */
        }

        .card-header h4 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card-body p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
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
        <a href="/Desa">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="/Histori">Histori</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LogOut</a>
        <form id="logout-form" method="POST" action="/logout" style="display:none;">
            @csrf
        </form>
    </div>

    <div class="content">
        @extends("penduduks.layouts")

        @section("content")
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Show Penduduk</h4>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ route('penduduks.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{$penduduk->id}}</p>
                <p><strong>Nama:</strong> {{$penduduk->nama}}</p>
                <p><strong>Nik:</strong> {{$penduduk->nik}}</p>
                <p><strong>Kecamatan:</strong> {{$penduduk->kecamatan}}</p>
                <p><strong>Kelurahan:</strong> {{$penduduk->kelurahan}}</p>
                <p><strong>Alamat:</strong> {{$penduduk->alamat}}</p>
                <p><strong>Jenis Bantuan:</strong> {{$penduduk->jenis_bantuan}}</p>
                <p><strong>Nominal:</strong> {{$penduduk->nominal}}</p>
                <p><strong>Status Bantuan:</strong> {{$penduduk->status_bantuan}}</p>
            </div>
        </div>
        @endsection
    </div>
</body>

</html>
