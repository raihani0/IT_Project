<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Bantuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            background-color: #31363F;
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
            padding-top: 50px;
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
        <a href="/desa"> <i class="fas fa-map-marker-alt"></i> Desa</a>
        <a href="/bantuans" class="active"> <i class="fas fa-hand-holding-usd"></i> Bantuan</a>
        <a href="/dokumentasi"> <i class="fas fa-camera"></i>  Dokumentasi</a>
        <a href="/histori"> <i class="fas fa-history"></i> Histori</a>
        <!-- Dropdown for Logout -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle"> <i class="fas fa-sign-out-alt"></i> Logout :</a>
            <div class="dropdown-content">
                <a href="{{ route('logout.google') }}" onclick="event.preventDefault(); document.getElementById('logout-google-form').submit();">Logout Google</a>
                <form id="logout-google-form" method="GET" action="{{ route('logout.google') }}" style="display:none;">
                    @csrf
                </form>
                <a href="/login" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
                        <a href="{{ route('bantuans.create') }}" class="btn btn-md btn-success mb-3"> <i class="fas fa-plus"></i> Tambah Bantuan</a>
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
                                                <a href="{{ route('bantuans.show', $bantuan->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('bantuans.edit', $bantuan->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        } else if (session('error')) {
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        }
    </script>

</body>
</html>
