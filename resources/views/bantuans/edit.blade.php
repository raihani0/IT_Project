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
<<<<<<< HEAD
=======
        /* Prevent horizontal scrolling */
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
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

<<<<<<< HEAD
        .sidebar {
            background-color: #333;
            color: white;
            width: 200px;
=======
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
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
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

<<<<<<< HEAD
        .sidebar a:hover, .sidebar a.active{
            background-color: #575757;
        }
        .sidebar a.active {
=======
        .sidebar a:hover {
            background-color: #575757;
        }

        .sidebar a.active {
            background-color: #575757;
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
            border-left: 4px solid #4CAF50;
            padding-left: 16px;
        }

        .container {
<<<<<<< HEAD
            margin-left: 220px;
            padding-top: 70px;
            padding-bottom: 50px;
            max-width: calc(100% - 240px);
=======
            margin-left: 220px; /* Menyesuaikan jarak sidebar dengan konten */
            padding-top: 50px; /* Menyesuaikan jarak konten dengan header */
            padding-bottom: 50px;
            max-width: calc(100% - 240px); /* Pastikan konten tetap di dalam layar */
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
        }

        .breadcrumb-custom {
            background-color: white;
            padding: 10px 15px;
            border-radius: 5px;
<<<<<<< HEAD
            margin-bottom: 20px;
            font-size: 14px;
=======
            margin-bottom: 20px; /* Menambah jarak dengan elemen di bawahnya */
            font-size: 14px; 
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
        }

        .breadcrumb-custom a {
            text-decoration: none;
<<<<<<< HEAD
            color: #0d6efd;
=======
            color: #0d6efd; /* Warna biru untuk link */
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
        }

        .breadcrumb-custom a:hover {
            text-decoration: underline;
        }

        .page-title {
<<<<<<< HEAD
            font-size: 22px;
=======
            font-size: 20px;
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<<<<<<< HEAD
=======

>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
    <!-- Header -->
    <div class="header">
        <h1>SIM PENDUDUK</h1>
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
<<<<<<< HEAD
            <span>Admin</span>
=======
            <span>User</span>
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
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
<<<<<<< HEAD
        <!-- Breadcrumb -->
=======
        <!-- Custom Breadcrumb -->
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
        <div class="breadcrumb-custom">
            <a href="/bantuans">Bantuan</a>
        </div>

        <!-- Page Title -->
        <div class="page-title">
<<<<<<< HEAD
            Edit Bantuan
        </div>

        <!-- Form -->
=======
        Edit Bantuan
        </div>

>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
<<<<<<< HEAD
                        <form action="{{ route('bantuans.update', $bantuan->id) }}" method="POST">
=======
                        <form action="{{ route('bantuans.update', $bantuan->id) }}" method="POST" enctype="multipart/form-data">
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
                            @csrf
                            @method('PUT')

                            <!-- Judul -->
                            <div class="form-group mb-3">
<<<<<<< HEAD
                                <label class="font-weight-bold">NAMA BANTUAN</label>
=======
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $bantuan->title) }}" placeholder="Masukkan Judul Bantuan">
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESKRIPSI BANTUAN</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Deskripsi Bantuan">{{ old('description', $bantuan->description) }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

<<<<<<< HEAD
                            <!-- Status -->
                            <div class="form-group mb-3">
                                <label for="status">STATUS</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ old('status', $bantuan->status ?? '') == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('status', $bantuan->status ?? '') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
=======
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">PRICE</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $bantuan->price) }}" placeholder="Masukkan Harga Bantuan">
                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">STOCK</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $bantuan->stock) }}" placeholder="Masukkan Stok Bantuan">
                                        @error('stock')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
>>>>>>> f78a86205e7bf9db71cc15645c1ea617ebad77e2
                            </div>

                            <!-- Tombol Submit -->
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
        CKEDITOR.replace('description');
    </script>
</body>
</html>
