<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
    <title>Data Bantuan</title>
=======
    <title>Sistem Informasi Pendataan Masyarakat Miskin</title>
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
<<<<<<< HEAD
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

        .sidebar {
            background-color: #333;
            color: white;
            width: 200px;
            position: fixed;
            top: 50px; /*beri jarak antar header*/
            left: 0;
            bottom: 0;
            padding-top: 20px; /*jarak di dalam sidebar*/
            overflow-y: auto;
        }

        .sidebar a {
            padding: 7px 15px; /*menentukan jarak tulisan sidebar*/
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
        <a href="/Penduduk">Penduduk</a>
        <a href="/Desa">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="/Histori">Histori</a>
        <a href="/Logout">LogOut</a>
    </div>

    <!-- Main Content -->
    <div class="container mt-5 mb-5">
        <!-- Breadcrumb -->
        <div class="breadcrumb-custom">
            <a href="/bantuans">Bantuan</a>
        </div>

        <!-- Page Title -->
        <div class="page-title">
            Data Bantuan
        </div>

        <!-- Data Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('bantuans.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BANTUAN</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA BANTUAN</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col" style="width: 20%">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bantuans as $bantuan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $bantuan->title }}</td>
                                        <td>
                                            @if($bantuan->status)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('bantuans.destroy', $bantuan->id) }}" method="POST">
                                                <a href="{{ route('bantuans.show', $bantuan->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('bantuans.edit', $bantuan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center alert alert-danger">
                                            Data Bantuan belum Tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $bantuans->links() }}
                    </div>
=======
            background-color: #e5dfdc;
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
            background-color: #333;
            color: white;
            position: fixed;
            top: 50px; /* Beri jarak dari header */
            bottom: 0;
            padding-top: 20px; /* Jarak di dalam sidebar */
            font-size: 16px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 7px 15px; /* Ini menentukan jarak tulisan sidebar */
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
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
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        .main-title {
            font-size: 22px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="title">SIM PENDUDUK</div>
        <div class="user">
            <i class="fas fa-user-circle"></i> User
        </div>
    </div>

    <div class="sidebar">
        <a href="/Home">Dashboard</a>
        <a href="#">Penduduk</a>
        <a href="/Desa">Desa</a>
        <a href="/bantuans" class="active">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="#">Histori</a>
        <a href="#">LogOut</a>
    </div>

    <div class="content">
    <div class="breadcrumb">
            <a href="/bantuans">Bantuan</a>
        </div>
        <div class="container">
            <h3 class="main-title">Sistem Informasi Pendataan Masyarakat Miskin Di Kecamatan Batu-Ampar</h3>

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h5 class="text-center mb-3">Daftar Bantuan</h5>
                    <a href="{{ route('bantuans.create') }}" class="btn btn-md btn-success mb-3">ADD BANTUAN</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">IMAGE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">STOCK</th>
                                <th scope="col" style="width: 20%">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bantuans as $bantuan)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/bantuans/'.$bantuan->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $bantuan->title }}</td>
                                    <td>{{ "Rp " . number_format($bantuan->price,2,',','.') }}</td>
                                    <td>{{ $bantuan->stock }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Ini ?');" action="{{ route('bantuans.destroy', $bantuan->id) }}" method="POST">
                                            <a href="{{ route('bantuans.show', $bantuan->id) }}" class="btn btn-sm btn-dark">LIHAT</a>
                                            <a href="{{ route('bantuans.edit', $bantuan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="alert alert-danger">
                                            Data Bantuan belum Tersedia.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $bantuans->links() }}
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
<<<<<<< HEAD
        // Aktifkan menu sesuai URL saat ini
        const currentUrl = window.location.pathname;
        const menuLinks = document.querySelectorAll('.sidebar a');

        menuLinks.forEach(link => {
            if (link.getAttribute('href') === currentUrl) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });

        // Notifikasi menggunakan SweetAlert
        if (session('success')) {
=======
        // SweetAlert message
        if(session('success'))
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
<<<<<<< HEAD
        } else if (session('error')) {
=======
        else if(session('error'))
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
<<<<<<< HEAD
        }
=======
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
    </script>

</body>
</html>
