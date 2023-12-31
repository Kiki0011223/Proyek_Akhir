<?php

namespace App\Http\Controllers;
use App\Charts\JenisKelamin;
use App\Charts\Keterangan;
use App\Charts\PinjamBuku;
use App\Models\menu_utama;
use App\Models\pengembalian_buku;
use App\Models\pinjam_buku;
use Illuminate\Http\Request;

class menu_utama_Controller extends Controller
{
    
    // untuk menampikan tampilan menu utama
    public function tampil(){
        $dataAll = menu_utama::all(); // mengambil semua data dari tabel menu utama

        return view('Tampilan_menu_utama', compact('dataAll'));

    }

    // menampilan tampilan pinjam buku berdasarkan id buku yang di pinjam
    public function tampil2($id_buku)
    {
        $dataAll = menu_utama::find($id_buku);

        if (!$dataAll) {
            
            return redirect()->route('home')->with('error', 'Book not found.');
        }

        return view('Tampilan_pinjam_buku', compact('dataAll'));
    }

    // membuat data pinjam buku baru setelah klik pinjam buku dan mengisi data di menu utama
    public function create_pinjam1(Request $request, $id_buku)
    {
        pinjam_buku::create([
            'nama' => $request->input('nama'),
            'id_buku' => $id_buku,
            'nama_buku' => $request->input('nama_buku'),
            'tgl_pinjam' => $request->input('tgl_pinjam'),
            'tgl_pengembalian' => $request->input('tgl_pengembalian'),
        ]);

        return redirect()->route('tabel_pinjam')->with('success', 'Buku Berhasil Dipinjam');
    }

    // CRUD MENU UTAMA
            public function create()
            {
                return view('/menu_utama_create');
            }

            public function update($id_buku)
            {
                if($data=menu_utama::find($id_buku)) {
                    return view('/menu_utama_update',['data'=>$data]);
                } else return redirect('/menu_utama_read');
            }

            public function edit(Request $request)
            {
                if ($data = menu_utama::find($request->id_buku)) {
                    $data->nama_buku = $request->input('nama_buku');
                    $data->nama_pengarang = $request->input('nama_pengarang');
                    $data->tahun_terbit = $request->input('tahun_terbit');
                    $data->keterangan = $request->input('keterangan');

                    // Handle image upload
                    if ($request->hasFile('gambar')) {
                        $imagePath = $request->file('gambar')->store('gambar_buku', 'public');
                        $data->gambar = $imagePath;
                    }

                    $data->save();
                    return redirect('/menu_utama_read')->with('pesan', 'Data dengan ID buku: '.$request->id_buku.' berhasil diupdate');
                } else {
                    return redirect('/menu_utama_read')->with('pesan', 'Data tidak ditemukan/gagal diupdate');
                }
            }

            public function save(Request $request)
            {
                $rules = [
                    'nama_buku' => 'required',
                    'nama_pengarang' => 'required',
                    'tahun_terbit' => 'required|numeric',
                    'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'keterangan' => 'required',
                ];

                $messages = [
                    // Define your validation messages here
                ];

                $validatedData = $request->validate($rules, $messages);

                // Handle image upload
                $imagePath = $request->file('gambar')->store('gambar_buku', 'public');

                $model = new menu_utama();
                // Do not set id_buku here if it's auto-incremented in the database

                $model->nama_buku = $request->input('nama_buku');
                $model->nama_pengarang = $request->input('nama_pengarang');
                $model->tahun_terbit = $request->input('tahun_terbit');
                $model->gambar = $imagePath;
                $model->keterangan = $request->input('keterangan');
                $model->save();

                // Redirect to a different route or return a view with the saved data
                return redirect('/menu_utama_read')->with('success', 'Data berhasil disimpan');
            }


            
            public function read()
            {
                $model = new menu_utama ();
                $dataAll=$model->all();
                return view('/menu_utama_read', ['dataAll'=>$dataAll]);
            }

            public function delete($id_buku)
            {
                if ($data = menu_utama::find($id_buku))
                {
                    $data->delete();
                } else {
                    return redirect('/menu_utama_read')->with('pesan', 'Data id buku : '.@$id_buku.' tidak ditemukan');
                }   
                return redirect('/menu_utama_read')->with('pesan', 'Data id buku : '.@$id_buku.' Berhasil dihapus');
            }

    // log out
    public function logout(){
        return view('logout');
    }

    // menampilkan dan mengambil data dari tabel ke chart
    public function chart(Request $request,JenisKelamin $jenisKelamin
    ,PinjamBuku $status, Keterangan $keterangan){

        $dataMenuUtama = menu_utama::all();
        $dataPengembalian = pengembalian_buku::all();
        $dataPinjam = pinjam_buku::all();

        $data['jenisKelamin'] = $jenisKelamin->build();
        $data['status'] = $status->build();
        $data['keterangan'] = $keterangan->build();
        
        return view('/dashboard', compact('data','dataMenuUtama', 'dataPengembalian', 'dataPinjam'));

    }

}