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
        <a href="/histori">Histori</a>
        <a href="#" onclick="confirmLogout()">LogOut</a>
        <form id="logout-form" method="POST" action="/logout" style="display:none;">
            @csrfs
        </form>

        <script>
            function confirmLogout() {
                if (confirm("Apakah Anda yakin ingin logout?")) {
                    document.getElementById('logout-form').submit();
                }
            }

            function confirmDelete(event) {
                if (!confirm("Apakah Anda yakin ingin menghapus data penduduk ini?")) {
                    event.preventDefault(); // Mencegah form dikirimkan jika tidak yakin
                }
            }
        </script>
    </div>

    <div class="content">
        <div class="breadcrumb">
            <a href="/penduduks">Penduduk</a>
        </div>
        <div class="page-title">
            Data Penduduk
        </div>
        <div class="card">
            <div class="card-body">
                <!-- Tombol Tambah Penduduk -->
                <a href="{{ route('penduduks.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PENDUDUK</a>

                <!-- Tabel Data Penduduk -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Desa</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Bantuan</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Status Bantuan</th>
                            <th scope="col" style="width: 20%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penduduks as $penduduk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penduduk->nama }}</td>
                            <td>{{ $penduduk->nik }}</td>
                            <td>{{ $penduduk->desa }}</td>
                            <td>{{ $penduduk->alamat }}</td>
                            <td>{{ $penduduk->jenis_bantuan }}</td>
                            <td>{{ $penduduk->nominal }}</td>
                            <td>
                                @if($penduduk->status_bantuan == 1)
                                <span class="badge bg-success badge-status">Sudah Menerima</span>
                                @else
                                <span class="badge bg-danger badge-status">Belum Menerima</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form onsubmit="confirmDelete(event)" action="{{ route('penduduks.destroy', $penduduk->id) }}" method="POST">
                                    <a href="{{ route('penduduks.show', $penduduk->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('penduduks.edit', $penduduk->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
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
