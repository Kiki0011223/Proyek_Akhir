<x-app-layout>
    <style>
        #bg{
            background-image: url("{{ asset('gambar/bg6.png') }}");
            padding: 5%;
        }

        #bg2{
            background-image: url("{{ asset('gambar/bg7.png') }}");
            padding: 5%;
        }

        #margin{
            margin-top: 2%;
        }

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
</head>
<body>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
    </x-slot>
    <div class="container"><hr>
    <center>
        <h1 class="custom-font font-semibold text-x2 text-gray-800 leading-tight">
            {{ __('RECORD DATA SEMUA TABEL') }}
        </h1><hr>
    </center>

        <div class="row mt-3 mb-3">

            <div class="col-md-6">
                <div class="card">
                    <div id="bg" class="card-body">
                        {!! $data['jenisKelamin']->container() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="bg" class="card-body">
                        {!! $data['status']->container() !!}
                    </div>
                </div>
            </div>

            <div id="margin" class="col-md-12">
                <div class="card">
                    <div id="bg2" class="card-body">
                        {!! $data['keterangan']->container() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <section class="table-responsive">
                        <h5 class="m-2">#TABEL PENGEMBALIAN</h5><hr>
                        <table class=" table table-striped m-auto mb-3 mt-2 text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NO.</th>
                                    <th>ID_Pengembalian</th>
                                    <th>ID_Pinjam</th>
                                    <th>Nama</th>
                                    <th>ID_Buku</th>
                                    <th>Nama Buku</th>
                                    <th>Waktu Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                foreach ($dataPengembalian as $datax) {
                                    $rowClass = $num % 2 == 1 ? 'table-info' : '';
                                    ?>
                                    <tr class="{{ $rowClass }}">
                                        <th scope="row">{{ $num }}</th>
                                        <td>{{ $datax->id_pengembalian }}</td>
                                        <td>{{ $datax->id_pinjam }}</td>
                                        <td>{{ $datax->nama }}</td>
                                        <td>{{ $datax->id_buku }}</td>
                                        <td>{{ $datax->nama_buku }}</td>
                                        <td>{{ $datax->tgl_pengembalian }}</td>
                                    </tr>
                                    <?php
                                    $num++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <section class="table-responsive">
                        <h5 class="m-2">#TABEL PINJAM</h5><hr>
                        <table class=" table table-striped m-auto mb-3 mt-2 text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NO.</th>
                                    <th>ID_Pinjam</th>
                                    <th>Nama</th>
                                    <th>ID_Buku</th>
                                    <th>Nama Buku</th>
                                    <th>Status</th>
                                    <th>Waktu Pinjam</th>
                                    <th>Waktu Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                foreach ($dataPinjam as $datax) {
                                    $rowClass = $num % 2 == 1 ? 'table-info' : '';
                                    ?>
                                    <tr class="{{ $rowClass }}">
                                        <th scope="row">{{ $num }}</th>
                                        <td>{{ $datax->id_pinjam }}</td>
                                        <td>{{ $datax->nama }}</td>
                                        <td>{{ $datax->id_buku }}</td>
                                        <td>{{ $datax->nama_buku }}</td>
                                        <td>{{ $datax->status }}
                                        <td>{{ $datax->tgl_pinjam }}</td>
                                        <td>{{ $datax->tgl_pengembalian }}</td>
                                    </tr>
                                    <?php
                                    $num++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <section class="table-responsive">
                        <h5 class="m-2">#TABEL MENU UTAMA</h5><hr>
                        <table class=" table table-striped m-auto mb-3 mt-2 text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>NO.</th>
                                    <th>ID_Buku</th>
                                    <th>Nama Buku</th>
                                    <th>Nama Pengarang</th>
                                    <th>Tahun Terbit</th>
                                    <th>Gambar</th>
                                    <th>keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                foreach ($dataMenuUtama as $datax) {
                                    $rowClass = $num % 2 == 1 ? 'table-info' : '';
                                    ?>
                                    <tr class="{{ $rowClass }}">
                                        <th scope="row">{{ $num }}</th>
                                        <td>{{ $datax->id_buuku }}</td>
                                        <td>{{ $datax->nama_buku }}</td>
                                        <td>{{ $datax->nama_pengarang }}</td>
                                        <td>{{ $datax->tahun_terbit }}</td>
                                        <td>{{ $datax->gambar }}
                                        <td>{{ $datax->keterangan }}</td>
                                    </tr>
                                    <?php
                                    $num++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
        
        <script src="{{ $data['jenisKelamin']->cdn() }}"></script>
        {{ $data['jenisKelamin']->script() }}
        <script src="{{ $data['status']->cdn() }}"></script>
        {{ $data['status']->script() }}
        <script src="{{ $data['keterangan']->cdn() }}"></script>
        {{ $data['keterangan']->script() }}
    </body>
    </html>
    </x-app-layout>
