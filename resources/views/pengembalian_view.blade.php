
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q81/X+965Dz00rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRVH+8abtTElPi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-U02eT0CpHqdSJQ6hJty5KVphtPhzWj9W01clHTMG3JDZwrnQq4sF86dIHNDZ0w1" cross origin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd@p3pXB1rRibZUAYOIIy60rQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<center>
<h2> Data Baru Pengembalian Buku Berhasil disimpan </h2>
<hr/>
    <table class="table table-primary" style='width:50%; table-align:center;'>
        <tbody>
            <tr>
                <th scope="row">5</th>
                <td>ID_Pengembalian</td>
                <td>{{$data['id_pengembalian']}}</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>ID_Pinjam</td>
                <td>{{$data['id_pinjam']}}</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Nama</td>
                <td>{{$data['nama']}}</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>ID_Buku</td>
                <td>{{$data['id_buku']}}</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Nama Buku</td>
                <td>{{$data['nama_buku']}}</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Tanggal Pengembalian</td>
                <td>{{$data['tgl_pengembalian']}}</td>
            </tr>
           
        </tbody>
    </table> 
</center>
<hr />
<center>
<a href=/pengembalian_read class="btn btn-success"> Tampilkan Data </a>
</center>