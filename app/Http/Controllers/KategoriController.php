<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');

    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

        // $data=[
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack / Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert Data Baru Berhasil!';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'Update Data Berhasil. Jumlah Data yang Diupdate: '.$row. ' baris';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'Delete Data Berhasil. Jumlah Data yang Dihapus: '.$row. ' baris';

        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);
    
}
