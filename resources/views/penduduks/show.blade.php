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
                        <h4>Show Penduduk</h4>  
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ route('penduduks.index')}}" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
             <p><strong>ID:</strong>{{$penduduk->id}}</p>
             <p><strong>Nama:</strong>{{$penduduk->nama}}</p>
             <p><strong>Nik:</strong>{{$penduduk->nik}}</p>
             <p><strong>Id_Desa:</strong>{{$penduduk->id_desa}}</p>
             <p><strong>Id_Bantuan:</strong>{{$penduduk->id_bantuan}}</p>
             <p><strong>Id_Kreteria:</strong>{{$penduduk->id_kreteria}}</p>
             <p><strong>Alamat:</strong>{{$penduduk->alamat}}</p>
             <p><strong>Tanggal_Lahir:</strong>{{$penduduk->tanggal_lahir}}</p>
             <p><strong>Kondisi_Rumah:</strong>{{$penduduk->kondisi_rumah}}</p>
             <p><strong>Jumlah_Tanggungan:</strong>{{$penduduk->jumlah_tanggungan}}</p>
             <p><strong>anggal_Penerimaan:</strong>{{$penduduk->tanggal_penerimaan}}</p>
             <p><strong>Status_Penerimaan:</strong>{{$penduduk->status_penerimaan}}</p>
            </div>
        </div>
 @endsection
