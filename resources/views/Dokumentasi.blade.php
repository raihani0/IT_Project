<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;"> <!-- Batas lebar & posisi tengah -->
            <div class="card-body p-4">
                <h5 class="card-title mb-4 text-center">Form Upload File</h5>
                <form method="post" action="/files" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file_name" class="form-label">Nama File</label>
                        <input type="text" name="file_name" id="file_name" class="form-control" placeholder="Masukkan nama file" required>
                        @error('file_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih File</label>
                        <input type="file" name="file" id="file" class="form-control" required>
                        @error('file_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>