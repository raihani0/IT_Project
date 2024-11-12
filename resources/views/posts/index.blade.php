
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
                 <h4>Post</h4>  
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('posts.create')}}" class="btn btn-success">Create post</a>
            </div>
          </div>  
    </div>
        <div class="card-body">

             @session("success")
             <div calss="alert alert-success">{{$value}}</div>
             @endsession
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>
                            <form method="POST" action="{{ route('posts.destroy', $post->id ) }}">
                            @csrf
                            @method('DELETE')
                            
                            <a href="{{ route('posts.show', $post->id) }}"class="btn btn-primary">Show
                            </a>
                            <a href="{{ route('posts.edit', $post ->id) }}" class="btn btn-info">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>    
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>  
            </table>

            {{ $posts->links() }}
        </div>
    </div>
@endsection
