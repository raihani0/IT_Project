<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penduduk</title>
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
        /* Aturan untuk membuat kolom lebih lebar dan mencegah perpanjangan ke bawah */
        .table td, .table th {
            white-space: nowrap; /* Mencegah teks membungkus ke baris baru */
            overflow: hidden; /* Menghindari overflow konten */
            text-overflow: ellipsis; /* Menampilkan ellipsis jika teks terlalu panjang */
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
                        <h4>Penduduk</h4>  
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ route('penduduks.create')}}" class="btn btn-success">Create Penduduk</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <p>Data Penduduk</p>
                <div class="table-responsive">
                    <table class="table table-bordered"> 
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nik</th>
                                <th>Id_Desa</th>
                                <th>Id_Bantuan</th>
                                <th>Id_Kreteria</th>
                                <th>Alamat</th>
                                <th>Tanggal_Lahir</th>
                                <th>Kondisi_Rumah</th>
                                <th>Jumlah_Tanggungan</th>
                                <th>Tanggal_Penerimaan</th>
                                <th>Status_Penerimaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penduduks as $penduduk)
                            <tr>
                                <td>{{ $penduduk->id }}</td>
                                <td>{{ $penduduk->nama }}</td>
                                <td>{{ $penduduk->nik }}</td>
                                <td>{{ $penduduk->id_desa }}</td>
                                <td>{{ $penduduk->id_bantuan }}</td>
                                <td>{{ $penduduk->id_kreteria }}</td>
                                <td>{{ $penduduk->alamat }}</td>
                                <td>{{ $penduduk->tanggal_lahir }}</td>
                                <td>{{ $penduduk->kondisi_rumah }}</td>
                                <td>{{ $penduduk->jumlah_tanggungan }}</td>
                                <td>{{ $penduduk->tanggal_penerimaan }}</td>
                                <td>{{ $penduduk->status_penerimaan }}</td>
                                <td>
                                    <form method="POST" action="{{ route('penduduks.destroy', $penduduk->id ) }}">
                                        @csrf
                                        @method('DELETE') 
                                        
                                        <a href="{{ route('penduduks.show', $penduduk->id) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('penduduks.edit', $penduduk->id) }}" class="btn btn-info">Edit</a>
                                        <button class="btn btn-danger">Delete</button>  
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $penduduks->links() }}
            </div>
        </div>
        @endsection
    </div>
</body>
</html>
