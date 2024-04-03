<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use App\DataTables\UserDataTable;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar User yang Terdaftar Dalam Sistem'
        ];

        $activeMenu = 'user';

        $level = LevelModel::all();

        return view('user.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'level' => $level
        ]);
    }

    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'name', 'level_id')
            ->with('level');

        //Filter Data User Berdasarkan Level_ID
        if($request->level_id){
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/edit/' . $user->user_id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    // public function index(UserDataTable $dataTable)
    // {
    //     return $dataTable->render('user_tes.index');
    // }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah User']
        ];

        $page = (object) [
            'title' => 'Tambah User Baru'
        ];

        $level = LevelModel::all();
        $activeMenu = 'user';

        return view('user.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'name' => 'required|string|max:100',
            'password' => 'required|string|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data User Berhasil Disimpan');
    }


    // $password = Hash::make($validated['password']);

    // UserModel::create([
    //     'level_id' => $validated['level_id'],
    //     'username' => $validated['username'],
    //     'name' => $validated['name'],
    //     'password' => Hash::make($validated['password']),
    // ]);

    // return redirect('/user_tes');
    
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail User'
        ];

        $activeMenu = 'user';

        return view('user.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit User'
        ];

        $activeMenu = 'user';   

        return view('user.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {   
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,'.$id. ',user_id',
            'name' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);
        
        UserModel::find($id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data User Berhasil Diubah');

        // $user->level_id = $request->level_id;
        // $user->username = $request->username;
        // $user->name = $request->name;
        // $user->password = $request->password;
        // $user->save();
        // return redirect('/user_tes');
    }

    public function destroy($id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data User Tidak Ditemukan');
        }

        try{
            UserModel::destroy($id);

            return redirect('/user')->with('success', 'Data User Berhasil Dihapus');
        }
        catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data User Gagal Dihapus Karena Masih Terdapat Tabel yang Terkait Dengan Data Ini');
        }
        // UserModel::find($id)->delete();

        // return redirect('/user_tes');
    }




    // public function index()
    // {
    //     // $user = UserModel::all();
    //     $user = userModel::with('level')->get();
    //     //dd($user);
    //     return view('user', ['data' => $user]);

    // }

    // public function tambah()
    // {
    //     return view('user_tambah');
    // }

    // public function tambah_simpan(Request $request)
    // {
    //     UserModel::create([
    //         'username' => $request->username,
    //         'name' => $request->name,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id
    //     ]);

    //     return redirect('/user');
    // }

    // public function ubah($id)
    // {
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data' => $user]);
    // }

    // public function ubah_simpan($id, Request $request)
    // {
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->name = $request->name;
    //     $user->password = Hash::make($request->password);
    //     $user->level_id = $request->level_id;
    //     $user->save();

    //     return redirect('/user');
    // }

    // public function hapus($id)
    // {
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    // }

    // $user = UserModel::create([
    //     'username' => 'manager11',
    //     'name' => 'Manager11',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2,
    // ]);

    // $user->username = 'manager12';
    // $user->save();

    // $user->wasChanged(); //true
    // $user->wasChanged('username'); //true
    // $user->wasChanged(['name', 'username']); //true
    // $user->wasChanged('name'); //false
    // dd($user->wasChanged(['name', 'username'])); //true


    // $user = UserModel::create([
    //     'username' => 'manager55',
    //     'name' => 'Manager55',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2,
    // ]);

    // $user -> username = 'manager56';

    // $user->isDirty(); //true
    // $user->isDirty('username'); //true
    // $user->isDirty('name'); //false
    // $user->isDirty(['name', 'username']); //true

    // $user->isClean(); //false
    // $user->isClean('username'); //false
    // $user->isClean('name'); //true
    // $user->isClean(['name', 'username']); //false

    // $user->save();

    // $user->isDirty(); //false
    // $user->isClean(); //true
    // dd($user->isDirty());



    // $user = UserModel::firstOrNew(
    //     [
    //         'username' => 'manager33',
    //         'name' => 'Manager Tiga Tiga',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ],
    // );
    // $user -> save();

    // $user = UserModel::firstOrCreate(
    //     [
    //         'username' => 'manager22',
    //         'name' => 'Manager Dua Dua',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ],
    // );

    //$user = UserModel::where('level_id', 2)-> count();
    //dd($user);

    //$user = UserModel::where('username', 'manager9')->firstOrFail();

    //$user = UserModel::findOrFail(1);

    // $user = UserModel::findOr(20, ['username', 'name'], function(){
    //     abort(404);
    // });

    // $data = [
    //     'username' => 'customer-1',
    //     'name' => 'Pelanggan',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 4
    // ];
    // UserModel::insert($data);

    // $data = [
    //     'name' => 'Pelanggan Pertama',
    // ];
    // UserModel::where('username', 'customer-1')->update($data);

    // $data = [
    //     'level_id' => 2,
    //     'username' => 'manager_tiga',
    //     'name' => 'Manager 3',
    //     'password' => Hash::make('12345')
    // ];
    // UserModel::create($data);

    //$user = UserModel::firstWhere('level_id', 1);

}
