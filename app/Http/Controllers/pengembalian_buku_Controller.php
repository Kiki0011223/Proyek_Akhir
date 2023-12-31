<?php

namespace App\Http\Controllers;
use App\Models\pengembalian_buku;
use Illuminate\Http\Request;

class pengembalian_buku_Controller extends Controller
{
    public function tabel(){
        $dataAll = pengembalian_buku::all(); // mengambil semua data

        return view('Tampilan_pengembalian_buku_tabel', compact('dataAll'));
    }


// CRUD pengembalian
    public function create_pengembalian()
    {
        return view('pengembalian_create');
    }

    public function update_pengembalian($id_pengembalian)
    {
        if($data=pengembalian_buku::find($id_pengembalian)) {
            return view('pengembalian_update',['data'=>$data]);
        } else return redirect('/pengembalian_read');
    }

    public function edit_pengembalian(Request $request)
    {
        if($data=pengembalian_buku::find($request->id_pengembalian)) {
            $data->id_pengembalian=@$request->id_pengembalian;
            $data->id_pinjam=@$request->id_pinjam;
            $data->nama=@$request->nama;
            $data->id_buku=@$request->id_buku;
            $data->nama_buku=@$request->nama_buku;
            $data->tgl_pengembalian=@$request->tgl_pengembalian;
            $data->save();
            return redirect('/pengembalian_read')->with('pesan', 'data dengan ID Pengembalian : '.$request->id_pengembalian.' berhasil diupdate');
    } else {
        return redirect('/pengembalian_read')->with('pesan', 'data tidak ditemukan/gagal diupdate');
    }

    }

    public function save_pengembalian (Request $request)
    {
        $aturan =[
            'id_pengembalian' => 'required',
            'id_pinjam' => 'required',
            'nama' => 'required',
            'id_buku' => 'required',
            'nama_buku' => 'required',
            'tgl_pengembalian' => 'required',
        
        ];

        $pesan =[
            // isi pesan disini
        ];

        $validatedData = $request->validate($aturan, $pesan);

        $model = new pengembalian_buku ();
        $model::insert([
            'id_pengembalian' => $request->id_pengembalian,
            'id_pinjam' => $request->id_pinjam,
            'nama' => $request->nama,
            'id_buku' => $request->id_buku,
            'nama_buku' => $request->nama_buku,
            'tgl_pengembalian' => $request->tgl_pengembalian,

            
        ]);
        
        return view('pengembalian_view',['data'=>$request->all()]);
    }
    
    public function read_pengembalian()
    {
        $model = new pengembalian_buku ();
        $dataAll=$model->all();
        return view('pengembalian_read', ['dataAll'=>$dataAll]);
    }

    public function delete_pengembalian($id_pengembalian)
    {
        if ($data = pengembalian_buku::find($id_pengembalian))
        {
            $data->delete();
        } else {
            return redirect('/pengembalian_read')->with('pesan', 'Data Id Pengembalian : '.@$id_pengembalian.' tidak ditemukan');
        }   
        return redirect('/pengembalian_read')->with('pesan', 'Data Id Pengembalian : '.@$id_pengembalian.' Berhasil dihapus');
    }


    public function logout(){
        return view('logout');
    }
}