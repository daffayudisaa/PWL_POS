<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        //mengambil data user dan disimpan pada variabel $user
        $user = Auth::user();

        //kondisi jika user ada
        if ($user){
            //jika user memiliki level admin
            if ($user->level_id == '1'){
                return redirect()->intended('admin');
            }

            //jika user memiliki level manager
            else if ($user->level_id == '2'){
                return redirect()->intended('manager');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        //membuat validasi ketika tombol login diklik
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //ambil data request username dan password saja
        $credential = $request->only('username', 'password');

        //cek jika data username dan password valid
        if (Auth::attempt($credential)){

            //kalau berhasil simpan data user pada variabel $user
            $user = Auth::user();

            //cek jika level user adalah admin dan diarahkan menuju halaman admin
            if ($user->level_id == '1'){
                return redirect()->intended('admin');
            }

            //cek jika level user adalah manager dan diarahkan menuju halaman user
            else if ($user->level_id == '2'){
                return redirect()->intended('manager');
            }

            //jika belum ada role
            return redirect()->intended('/');
        }

        //jika tidak ada data user yang valid maka kembali ke halaman login
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan Kembali Username dan Password yang Dimasukkan Sudah Benar!']);
    }

    public function  register()
    {
        //tampilkan view register
        return view('register');
    }

    public function proses_register(Request $request)
    {

        //membuat validasi ketika proses registrasi
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:m_user',
            'password' => 'required'
        ]);

        //jika gagal kembali ke halaman register
        if ($validator->fails()){
            return redirect('/register')
            ->withErrors($validator)
            ->withInput();
        }

        //kalau berhasil isi level dan hash password
        $request['level_id'] = '2';
        $request['password'] = Hash::make($request->password);

        //memasukkan semua data ke tabel user
        UserModel::create($request->all());

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        //logout dan menghapus sessionnya
        $request->session()->flush();

        //jalankan juga fungsi logout pada authnya
        Auth::logout();

        //kembali ke halaman login
        return Redirect('login');
    }
}
