<?php

namespace App\Http\Controllers;
use App\Models\pinjam_buku;
use App\Models\pengembalian_buku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class pinjam_buku_Controller extends Controller
{
    
    // menampilkan Tampilan pinjam buku tabel di sertai pengambilan data dari pinjam buku
    public function tabel(){
        $dataAll = pinjam_buku::all(); //mengambil semua data

        return view('Tampilan_pinjam_buku_tabel', compact('dataAll'));
    }

    // untuk tombol action kembalikan di menu pinjam buku
    public function kembalikan($id_buku){
        
        $dataAll = pengembalian_buku::find($id_buku);
        if (!$dataAll) {
            // Handle if book not found
            return redirect()->route('dashboard')->with('error', 'Book not found.');
        }

        return view('Tampilan_pengembalian_buku', compact('dataAll'));
    }
    
    // membuat data baru pengembalian_buku setelah menekan tombol kembalikan
    public function create_pengembalian1(Request $request, $id_pinjam)
    {
        pengembalian_buku::create([
            'nama' => $request->input('nama'),
            'id_buku' => $request->input('id_buku'),
            'id_pinjam' => $request->input('id_pinjam'),
            'nama_buku' => $request->input('nama_buku'),
            'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
        ]);
    
        // Update the status in the pinjam_buku table
        $pinjamBuku = pinjam_buku::find($id_pinjam);
        if ($pinjamBuku) {
            $pinjamBuku->status = true; 
        } else {

            return redirect()->route('tabel_pinjam')->with('error', 'Book not found.');
        }

        return redirect()->route('tabel_pengembalian')->with('success', 'Buku berhasil dikembalikan');
    }




// CRUD PINJAM BUKU
    public function create_pinjam()
    {
        return view('pinjam_create');
    }

    public function update_pinjam($id_pinjam)
    {
        if($data=pinjam_buku::find($id_pinjam)) {
            return view('pinjam_update',['data'=>$data]);
        } else return redirect('/pinjam_read');
    }

    public function edit_pinjam(Request $request)
    {
        if($data=pinjam_buku::find($request->id_pinjam)) {
            $data->id_pinjam=@$request->id_pinjam;
            $data->nama=@$request->nama;
            $data->id_buku=@$request->id_buku;
            $data->nama_buku=@$request->nama_buku;
            $data->status=@$request->status;
            $data->tgl_pinjam=@$request->tgl_pinjam;
            $data->tgl_pengembalian=@$request->tgl_pengembalian;
            $data->save();
            return redirect('/pinjam_read')->with('pesan', 'data dengan ID Pinjam : '.$request->id_pinjam.' berhasil diupdate');
    } else {
        return redirect('/pinjam_read')->with('pesan', 'data tidak ditemukan/gagal diupdate');
    }

    }

    public function save_pinjam (Request $request)
    {
        $aturan =[
            'id_pinjam' => 'required',
            'nama' => 'required',
            'id_buku' => 'required',
            'nama_buku' => 'required',
            'status' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_pengembalian' => 'required',
        
        ];

        $pesan =[
            // isi pesan disini
        ];

        $validatedData = $request->validate($aturan, $pesan);

        $model = new pinjam_buku ();
        $model::insert([
            'id_pinjam' => $request->id_pinjam,
            'nama' => $request->nama,
            'id_buku' => $request->id_buku,
            'nama_buku' => $request->nama_buku,
            'status' => $request->status,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_pengembalian' => $request->tgl_pengembalian,

            
        ]);
        
        return view('pinjam_view',['data'=>$request->all()]);
    }
    
    public function read_pinjam()
    {
        $model = new pinjam_buku ();
        $dataAll=$model->all();
        return view('pinjam_read', ['dataAll'=>$dataAll]);
    }

    public function delete_pinjam($id_pinjam)
    {
        if ($data = pinjam_buku::find($id_pinjam))
        {
            $data->delete();
        } else {
            return redirect('/pinjam_read')->with('pesan', 'Data Id Pinjam : '.@$id_pinjam.' tidak ditemukan');
        }   
        return redirect('/pinjam_read')->with('pesan', 'Data Id Pinjam : '.@$id_pinjam.' Berhasil dihapus');
    }


    public function logout(){
        return view('logout');
    }
}