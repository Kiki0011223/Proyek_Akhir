<x-app-layout>
    <html>
    <head>
        <title>Pengembalian Buku</title>
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
            UPDATE DATA PENGEMBALIAN BUKU
            </div>

            <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" enctype="multipart/form-data" method="post" action="{{url('/edit_pengembalian')}}"> 
            @csrf

            <div class="form-group">
            ID_Pengembalian
            <input type="text" id="id_pengembalian" name="id_pengembalian" class="form-control" required="" value="{{$data->id_pengembalian}}" readonly> 
            </div>

            <div class="form-group">
            ID_Pinjam
            <input type="text" id="id_pinjam" name="id_pinjam" class="form-control" required="" value="{{$data->id_pinjam}}"> 
            </div>

            <div class="form-group">
            Nama
            <input type="text" id="nama" name="nama" class="form-control" required="" value="{{$data->nama}}"> 
            </div>

            <div class="form-group">
            ID_Buku
            <input type="text" id="id_buku" name="id_buku" class="form-control" required="" value="{{$data->id_buku}}"> 
            </div>

            <div class="form-group">
            Nama Buku
            <input type="text" id="nama_buku" name="nama_buku" class="form-control" required="" value="{{$data->nama_buku}}" > 
            </div>
    
            <div class="form-group">
            Tanggal Pengembalian
            <input type="date" id="tgl_pengembalian" name="tgl_pengembalian" class="form-control" required="" value="{{$data->tgl_pengembalian}}"> 
            </div>

            <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
            </div>
            </div>
        </div>
    </body>
    </html>\
    </x-app-layout>