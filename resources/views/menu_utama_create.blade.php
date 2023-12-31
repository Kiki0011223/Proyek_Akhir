<x-app-layout>
<html>
<head>
    <title>Menu Utama</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <div class="container mt-4">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            CREATE DATA MENU UTAMA
        </div>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" enctype="multipart/form-data" method="post" action="{{url('/save')}}">
        @csrf

            <div class="form-group">
            Nama Buku
            <input type="text" id="nama_buku" name="nama_buku" class="form-control" required="">
            </div>

            <div class="form-group">
            Nama Pengarang
            <input type="text" id="nama_pengarang" name="nama_pengarang" class="form-control" required="">
            </div>

            <div class="form-group">
            Tahun Terbit
            <input type="text" id="tahun_terbit" name="tahun_terbit" class="form-control" required="">
            </div>

            <div class="form-group">
            Gambar
            <input type="file" id="gambar" name="gambar" class="form-control" required="">
            </div>

            <div class="form-group">
            Keterangan
            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
</x-app-layout>