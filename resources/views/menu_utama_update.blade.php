<x-app-layout>
<html>
<head>
    <title>Menu Utama</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
| |         {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
        UPDATE DATA MENU UTAMA
        </div>
        <div class="card-body">
        <form name="add-blog-post-form" id="add-blog-post-form" enctype="multipart/form-data" method="post" action="{{url('/edit')}}"> 
        @csrf
        <div class="form-group">
        ID_Buku
        <input type="text" id="id_buku" name="id_buku" class="form-control" required="" value="{{$data->id_buku}}" readonly> 
        </div>
        <div class="form-group">
        Nama Buku
        <input type="text" id="nama_buku" name="nama_buku" class="form-control" required="" value="{{$data->nama_buku}}" > 
        </div>

        <div class="form-group">
        Nama Pengarang
        <input type="text" id="nama_pengarang" name="nama_pengarang" class="form-control" required="" value="{{$data->nama_pengarang}}"> 
        </div>

        <div class="form-group">
        Tahun Terbit
        <input type="text" id="tahun_terbit" name="tahun_terbit" class="form-control" required="" value="{{$data->tahun_terbit}}"> 
        </div>

        <div class="form-group">
        Gambar
        <input type="file" id="gambar" name="gambar" class="form-control" required="" value="{{$data->gambar}}">
        <img src="{{$data->gambar}}" alt=""> 
        </div>

        <div class="form-group">
        Keterangan
        <input type="text" id="keterangan" name="keterangan" class="form-control" required="" value="{{$data->keterangan}}"> 
        </div>

        <button type="submit" class="btn btn-primary">SUBMIT</button>
        </form>
        </div>
        </div>
    </div>
</body>
</html>\
</x-app-layout>