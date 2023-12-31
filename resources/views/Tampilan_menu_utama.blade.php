<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
    </head>
    <body>
        <style>
            @font-face {
        font-family: 'KristenITC';
        src: url('/path/to/kristenitc.woff2') format('woff2'),
             url('/path/to/kristenitc.woff') format('woff');
        font-weight: normal;
        font-style: normal;
        }

        .custom-font {
            font-family: 'KristenITC', sans-serif;
        }
        </style>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Utama') }}
        </h2>
        </x-slot>
        <div class="container"><hr>
        <center>
        <h1 class="custom-font font-semibold">SELAMAT DATANG DI PERPUSTAKAAN SMA</h1><hr>
        </center>
        <div class="row mt-3 mb-3">
        @foreach($dataAll as $menu_utama)
            <div class="col-md-3">
                <div class="card">
                    <a href="{{ route('tampil2', $menu_utama->id_buku) }}" class="text-decoration-none text-black">
                        <div class="card-body">
                            @if($menu_utama->gambar)
                                <img src="{{ asset('storage/'.$menu_utama->gambar) }}" alt="{{ $menu_utama->nama_buku }}" class="rounded img-fluid my-unique-card">
                            @else
                                <img src="{{ asset('path_to_default_image/default.jpg') }}" alt="Default Image" class="rounded img-fluid my-unique-card">
                            @endif
                            <center>
                            <h5 class="card-title mt-2">{{ $menu_utama->nama_buku }}</h5>
                            <h6 class="card-title mt-2">{{ "Pengarang : ".$menu_utama->nama_pengarang }}</h6>
                            <h6 class="card-title mt-2">{{ "Tahun Terbit : ".$menu_utama->tahun_terbit}}</h6>
                            <p>{{ $menu_utama->keterangan }}</p><hr>
                            <a href="{{ route('tampil2', $menu_utama->id_buku) }}" class="btn btn-primary">Pinjam Buku</a>
                            </center>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </body>
    </html>
    </x-app-layout>