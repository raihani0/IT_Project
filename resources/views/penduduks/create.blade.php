<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: auto; 
        }
        .table {
            width: 100%; 
        }
        .container {
            width: 100%; 
            max-width: 100%; 
        }
    </style>
</head>
<body>
    <div class="container pt-5">
    @extends("posts.layouts")

    @section("content")
        <div class="card">
            <div class="card-header">
                 <div class="row">
                     <div class="col-md-9">
                        <h4>Create Penduduk</h4>  
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ route('penduduks.index')}}" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('penduduks.store') }}">
                @csrf
                    <div class="mt-1">
                        <label>Nama:</label>
                        <input type="text" name="nama" class="form-control">
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>
                    <div class="mt-1">
                        <label>Nik:</label>
                        <input type="text" name="nik" class="form-control">
                        @if ($errors->has('nik'))
                            <span class="text-danger">{{ $errors->first('nik') }}</span>
                        @endif
                    </div>
                    <div class="mt-1">
                        <label>Id_Desa:</label>
                        <input type="text" name="id_desa" class="form-control">
                    </div>
                    <div class="mt-1">
                        <label>Id_Bantuan:</label>
                        <input type="text" name="id_bantuan" class="form-control">
                    </div>
                    <div class="mt-1">
                        <label>Id_Kreteria:</label>
                        <input type="text" name="id_kreteria" class="form-control">
                    </div>
                    <div class="mt-1">
                        <label>Alamat:</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="mt-1">
                        <label>Tanggal_Lahir:</label>
                        <input type="date" name="tanggal_lahir" class="form-control">
                    </div>
                    <div class="mt-1">
                        <label>Kondisi_Rumah:</label>
                        <input type="text" name="kondisi_rumah" class="form-control">
                    </div>
                    <div class="mt-1">
                        <label>Jumlah_Tanggungan:</label>
                        <input type="number" name="jumlah_tanggungan" class="form-control">
                    </div>
                    <div class="mt-1">
                        <label>Tanggal_Penerimaan:</label>
                        <input type="date" name="tanggal_penerimaan" class="form-control">
                    </div>
                    <div class="mt-1">
                        <label>Status_Penerimaan:</label>
                        <input type="text" name="status_penerimaan" class="form-control">
                    </div>
                    <div class="mt-1">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
 @endsection
