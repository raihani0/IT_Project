<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Application Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Menambahkan border pada header dan sel tabel */
        table th, table td {
            padding: 12px; /* Padding untuk memberi jarak antara teks dan border */
            border: 1px solid #ddd; /* Border halus untuk pemisah antar sel */
        }

        /* Memberikan border collapse agar border lebih teratur */
        table {
            border-collapse: collapse;
            width: 100%; /* Agar tabel memenuhi lebar container */
        }

        /* Memberikan jarak antar elemen luar tabel */
        .container {
            padding: 20px;
        }

        /* Opsional: Mengatur lebar kolom ID agar lebih kecil */
        table th:first-child, table td:first-child {
            width: 50px; /* Lebar untuk kolom ID */
        }
    </style>
</head>
<body>
  
<div class="container pt-5">
      @yield("content")
</div>

</body>
</html>
