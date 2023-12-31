<x-app-layout>
        <!-- Include your CSS and JS libraries if needed -->
        <title>PENGEMBALIAN BUKU</title>
        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        <div class="container mt-5">
            <h2>Tampilan PENGEMBALIAN BUKU</h2>
    
            <form action="{{ route('create_pengembalian', $dataAll->id_buku) }}" method="post">
                @csrf
    
                <div class="mb-3">
                    <label for="id_pinjam" class="form-label">ID_Pinjam</label>
                    <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="{{ $dataAll->id_pinjam }}" required disabled>
                    <input type="hidden" name="id_pinjam" value="{{ $dataAll->id_pinjam }}">
                </div>
    
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->name }}" required disabled>
                    <input type="hidden" name="nama" value="{{ auth()->user()->name }}">
                </div>
    
                <div class="mb-3">
                    <label for="id_buku" class="form-label">ID_Buku</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku" value="{{ $dataAll->id_buku }}" required disabled>
                    <input type="hidden" name="id_buku" value="{{ $dataAll->id_buku }}">
                </div>
    
                <div class="mb-3">
                    <label for="nama_buku" class="form-label">Nama Buku</label>
                    <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="{{ $dataAll->nama_buku }}" required disabled>
                    <input type="hidden" name="nama_buku" value="{{ $dataAll->nama_buku }}">
                </div>
    
                <div class="mb-3">
                    <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="{{ $dataAll->tgl_pengembalian }}" required>
                </div>
    
                <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
            </form>
        </div>
    </x-app-layout>