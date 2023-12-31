<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTElPi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-U02eT0CpHqdSJQ6hJty5KVphtPhzWj9W01clHTMGa3JDZwrnQq4sF86dIHNDZOW1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd@p3pXB1rRibZUAYOIIy60rQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <hr />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pinjam Buku') }}
        </h2>
    </x-slot>
    <center>
        @if (session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
    
        <h2> MENU PINJAM BUKU </h2>
        <hr/>
        <section>
            <table class="table table-striped w-auto text-center">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $num = 1;
                    foreach ($dataAll as $datax) {
                        $rowClass = $num % 2 == 1 ? 'table-info' : '';
                        ?>
                        <tr class="{{ $rowClass }}">
                            <th scope="row">{{ $num }}</th>
                            <td>{{ $datax->id_pinjam }}</td>
                            <td>{{ $datax->nama }}</td>
                            <td>{{ $datax->id_buku }}</td>
                            <td>{{ $datax->nama_buku }}</td>
                            @if($datax->status == 1)
                                <td>Sudah Dikembalikan</td>
                            @else
                                <td>Belum Dikembalikan</td>
                            @endif
                            <td>{{ $datax->tgl_pinjam }}</td>
                            <td>{{ $datax->tgl_pengembalian }}</td>
                            <td>
                                @if($datax->status == 0)
                                    <a href="javascript:void(0);" onclick="kembalikan('{{ $datax->id_buku }}', '{{ $datax->id_pinjam }}', '{{ $datax->nama }}', '{{ $datax->id_buku }}', '{{ $datax->nama_buku }}','{{ $datax->tgl_pinjam }}', '{{ $datax->tgl_pengembalian }}')" class="btn btn-danger">KEMBALIKAN</a>
                                @else
                                    <button class="btn btn-danger" disabled>ANDA SUDAH MENGEMBALIKAN</button>
                                @endif
                            </td>
                        </tr>
                        <?php
                        $num++;
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <a href="/Tampilan_menu_utama" class="btn btn-success">PINJAM BUKU LAINNYA</a>
    </center>
    <hr/>
    <script>
        function kembalikan(id_buku, id_pinjam, nama, id_buku_val, nama_buku, tgl_pinjam, tgl_pengembalian) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/Tampilan_pengembalian_buku/' + id_pinjam;
    
            var csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}';
    
            var idPinjamField = document.createElement('input');
            idPinjamField.type = 'hidden';
            idPinjamField.name = 'id_pinjam';
            idPinjamField.value = id_pinjam;
    
            var namaField = document.createElement('input');
            namaField.type = 'hidden';
            namaField.name = 'nama';
            namaField.value = nama;
    
            var idBukuField = document.createElement('input');
            idBukuField.type = 'hidden';
            idBukuField.name = 'id_buku';
            idBukuField.value = id_buku_val;
    
            var namaBukuField = document.createElement('input');
            namaBukuField.type = 'hidden';
            namaBukuField.name = 'nama_buku';
            namaBukuField.value = nama_buku;

            var statusField = document.createElement('input');
            statusField.type = 'hidden';
            statusField.name = 'status';
            statusField.value = 1;
    
            var tglPinjamField = document.createElement('input');
            tglPinjamField.type = 'hidden';
            tglPinjamField.name = 'tgl_pinjam';
            tglPinjamField.value = tgl_pinjam;
    
            var tglPengembalianField = document.createElement('input');
            tglPengembalianField.type = 'hidden';
            tglPengembalianField.name = 'tgl_pengembalian';
            tglPengembalianField.value = tgl_pengembalian;
    
            form.appendChild(csrfField);
            form.appendChild(idPinjamField);
            form.appendChild(namaField);
            form.appendChild(idBukuField);
            form.appendChild(namaBukuField);
            form.appendChild(statusField);
            form.appendChild(tglPinjamField);
            form.appendChild(tglPengembalianField);
    
            // Append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
            return false;
        }
    </script>
    
</x-app-layout>

