
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
@extends("posts.layouts")

@section("content")
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-9">
                 <h4>Show Post</h4>  
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('posts.index')}}" class="btn btn-primary">Back</a>
            </div>
          </div>  
        </div>
        <div class="card-body">
             <p><strong>ID:</strong>{{$post->id}}</p>
             <p><strong>Title:</strong>{{$post->title}}</p>
             <p><strong>Body:</strong>{{$post->body}}</p>
        </div>
    </div>
@endsection