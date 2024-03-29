<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Models\LevelModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(LevelDataTable $dataTable)
    {
        return $dataTable->render('m_level.index');
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) 
        // values (?, ?, ?)', ['CUS', 'Pelanggan', now()]);   
        
        // return 'Insert Data Baru Berhasil!';

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', 
        // ['Customer', 'CUS']);
        // return 'Update Data Berhasil Jumlah Data yang Diupdate: '.$row.' baris';
        
        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete Data Berhasil. Jumlah Data yang Dihapus: '.$row.' baris';\

        // $data = DB::select('select * from m_level');
        // return view('level', ['data' => $data]);
    }

    public function create()
    {
        return view('m_level.create_level');
    }

    public function store(Request $request): RedirectResponse
    {   
        //dd($request->all());
        $validated = $request->validate([
            'kodeLevel' => 'bail|required|unique:m_level,level_kode',
            'namaLevel' => 'required',
        ]);

        LevelModel::create([
            'level_kode' => $validated['kodeLevel'],
            'level_nama' => $validated['namaLevel'],
        ]);

        return redirect('/m_level');
    }

    public function edit($id){
        $level = LevelModel::find($id);
        return view('m_level.edit_level', ['data' => $level]);
    }

    public function update(Request $request, $id){
        $level = LevelModel::find($id);
        $level->level_kode = $request->kodeLevel;
        $level->level_nama = $request->namaLevel;
        $level->save();
        return redirect('/m_level');    
    }

    public function destroy($id) {
        LevelModel::find($id)->delete();

        return redirect('/m_level');
    }
}
