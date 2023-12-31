<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTElPi6jizo" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-U02eT0CpHqdSJQ6hJty5KVphtPhzWj9W01clHTMGa3JDZwrnQq4sF86dIHNDZOW1" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd@p3pXB1rRibZUAYOIIy60rQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> <hr />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRUD Pengembalian Buku') }}
        </h2>
    </x-slot>
    <center>
        @if (session('pesan'))
            <div class="alert alert-success">
            {{ session('pesan') }}
            </div>
        @endif
    
    <h2> TABEL PENGEMBALIAN BUKU </h2>
    <hr/>
    <section>
        <table class="table table-striped w-auto text-center">
            <thead class=thead-dark>
                <tr>
                    <th>NO.</th>
                    <th>ID_Pengembalian</th>
                    <th>ID_Pinjam</th>
                    <th>Nama</th>
                    <th>ID_Buku</th>
                    <th>Nama Buku</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Action</th>
                </tr>
            </thead>
    <tbody>
    <?php
    $num=1;
    foreach ($dataAll as $datax) {
        if(($num%2)==1) {echo "<tr class='table-info'>";} else echo "<tr>";
            echo "<th scope='row'> $num </th>";
            echo "<td>";
            echo $datax->id_pengembalian;
            echo "</td>";
            echo "<td>";
            echo $datax->id_pinjam;
            echo "</td>";
            echo "<td>";
            echo $datax->nama;
            echo "</td>";
            echo "<td>";
            echo $datax->id_buku;
            echo "</td>";
            echo "<td>";
            echo $datax->nama_buku;
            echo "</td>";
            echo "<td>";
            echo $datax->tgl_pengembalian;
            echo "</td>";
            
            echo "<td>";
            echo "<a href=/delete_pengembalian/".$datax->id_pengembalian." onclick=\"return confirm('Yakin mau dihapus ?');\" class='btn btn-danger'> HAPUS</a>";
            echo "<a href=/pengembalian_update/".$datax->id_pengembalian." onclick=\"return confirm('Yakin data mau diedit/diupdate ?');\" class='btn btn-success'> UPDATE</a>";
            echo "</td>";
            echo "</tr>";
    
    $num++; }
    
    ?>
    </tbody>
    </table>
    </section>
    <a href=/pengembalian_create class='btn btn-success'> TAMBAH DATA</a>
    <a href=/dashboard class='btn btn-info'> KEMBALI</a>
    </center>
    <hr/>
    </x-app-layout>