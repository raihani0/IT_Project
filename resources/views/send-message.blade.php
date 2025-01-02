<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM PENDUDUK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #D3D3D3;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 7px 20px;
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

        .container h2 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .alert {
            margin-top: 20px;
        }

        /* Kotak Formulir */
        .form-container {
            background-color: #fff; /* Warna latar */
            border: 1px solid #ccc; /* Garis tepi */
            border-radius: 8px; /* Lengkung sudut */
            padding: 20px; /* Ruang dalam kotak */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="title">SIM PENDUDUK</div>
        <div class="user" style="position: relative;">
            <a href="#" onclick="toggleDropdown()" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                <i class="fas fa-user-circle" style="margin-right: 5px;"></i>
                <span>{{ Auth::user()->name }}</span> <!-- Menampilkan nama user yang sedang login -->
            </a>

            <!-- Dropdown Menu -->
            <div id="dropdown-menu" style="display: none; position: absolute; top: 30px; right: 0; background-color: #fff; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 150px; z-index: 1000;">
                <a href="{{ route('profile.edit') }}" style="display: block; padding: 10px; text-decoration: none; color: #333; font-size: 14px;">Edit Profil</a>
                <a href="{{ route('profile.view') }}" style="display: block; padding: 10px; text-decoration: none; color: #333; font-size: 14px;">Lihat Profil</a>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <a href="/Home" class="active">Dashboard</a>
        <a href="/penduduks">Penduduk</a>
        <a href="/Desa">Desa</a>
        <a href="/bantuans">Bantuan</a>
        <a href="/Dokumentasi">Dokumentasi</a>
        <a href="/histori">Histori</a>
        <!-- Dropdown for Logout -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">Logout :</a>
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
    <div class="content">
        <!-- Breadcrumb -->
        <div class="breadcrumb-custom">
            <a href="/home">Kirim Pesan</a>
        </div>
        <div class="container">
            <h2>Kirim Pesan Kepada Admin</h2>

            <!-- Menampilkan pesan sukses atau error -->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Kotak Formulir -->
            <div class="form-container">
                <form action="{{ url('/send-message') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">URL File (Opsional)</label>
                        <input type="url" class="form-control" id="file" name="file" placeholder="Masukkan URL file (jika ada)">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
    }

    // Tutup dropdown jika pengguna mengklik di luar dropdown
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown-menu');
        const user = document.querySelector('.user');

        if (!user.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>

</html>
