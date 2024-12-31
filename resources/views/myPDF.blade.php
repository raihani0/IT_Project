<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 11 Generate PDF</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                text-align: left;
                padding: 8px;
            }
            h1 {
                font-size: 24px; /* Ubah ukuran font di sini */
                text-align: center; /* Align title ke tengah */
                margin-bottom: 20px; /* Tambah jarak bawah */
            }
        </style>
    </head>
    <body>
        <h1>{{ $title }}</h1>
        <p>{{ $date }}</p>

        <p>Laporan ini menyajikan data masyarakat miskin di Kecamatan Batu Ampar. Laporan ini dibuat untuk mendukung transparansi, akuntabilitas, serta memastikan bantuan sosial tersalurkan dengan tepat sasaran.
        Berikut adalah daftar penerima bantuan sosial :
        </p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Desa</th>
                    <th>Alamat</th>
                    <th>Jenis Bantuan</th>
                    <th>Nominal</th>
                    <th>Status Bantuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penduduk as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->nik }}</td>
                    <td>{{ $value->desa_id }}</td>
                    <td>{{ $value->alamat }}</td>
                    <td>{{ $value->jenis_bantuan }}</td>
                    <td>{{ number_format($value->nominal, 2) }}</td>
                    <td>{{ $value->status_bantuan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
