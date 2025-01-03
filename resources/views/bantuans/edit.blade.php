<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Bantuan</title>
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

        #dropdown-menu {
            display: none;
            position: absolute;
            top: 30px;
            right: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 150px;
            z-index: 1000;
        }

        #dropdown-menu.show {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>SIM PENDUDUK</h1>
        <div class="user">
            <a href="#" onclick="toggleDropdown()" aria-label="User Menu" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <i class="fas fa-user-circle" style="margin-right: 5px;"></i>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <!-- Dropdown Menu -->
            <div id="dropdown-menu">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">Edit Profil</a>
                <a href="{{ route('profile.view') }}" class="dropdown-item">Lihat Profil</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/Home"><i class="fas fa-home"></i> Dashboard</a>
        <a href="/penduduk"><i class="fas fa-users"></i> Penduduk</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle"><i class="fas fa-calculator"></i> SAW :</a>
            <div class="dropdown-content">
                <a href="/kriteria">Kriteria</a>
                <a href="/alternatif">Alternatif</a>
                <a href="/hitung">Hitung</a>
            </div>
        </div>
        <a href="/desa"><i class="fas fa-map-marker-alt"></i> Desa</a>
        <a href="/bantuans" class="active"><i class="fas fa-hand-holding-usd"></i> Bantuan</a>
        <a href="/dokumentasi"><i class="fas fa-camera"></i> Dokumentasi</a>
        <a href="/histori"><i class="fas fa-history"></i> Histori</a>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">
                <i class="fas fa-sign-out-alt"></i> Logout :
            </a>
            <div class="dropdown-content">
                <a href="{{ route('logout.google') }}" onclick="event.preventDefault(); 
                    if(confirm('Apakah Anda yakin ingin logout dengan Google?')) { 
                        document.getElementById('logout-google-form').submit(); }"> Logout Google
                </a>
                <form id="logout-google-form" method="GET" action="{{ route('logout.google') }}" style="display:none;">
                    @csrf
                </form>
                <a href="/login" onclick="event.preventDefault(); 
                    if(confirm('Apakah Anda yakin ingin logout?')) { 
                        document.getElementById('logout-form').submit(); }"> Logout
                </a>
                <form id="logout-form" method="POST" action="/logout" style="display:none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-5 mb-5">
        <div class="breadcrumb-custom">
            <a href="/bantuans">Bantuan</a>
        </div>

        <div class="page-title">Edit Bantuan</div>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('bantuans.update', $bantuan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA BANTUAN</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $bantuan->title) }}" placeholder="Masukkan Judul Bantuan" required>
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESKRIPSI BANTUAN</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Deskripsi Bantuan" required>{{ old('description', $bantuan->description) }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="status">STATUS</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ old('status', $bantuan->status ?? '') == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('status', $bantuan->status ?? '') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.25.0/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            CKEDITOR.replace('description');
        });

        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.toggle('show');
        }

        document.addEventListener('click', (event) => {
            const dropdown = document.getElementById('dropdown-menu');
            const user = document.querySelector('.user');
            if (!user.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>
</body>
</html>
