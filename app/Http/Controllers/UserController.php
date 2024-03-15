<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::where('level_id', 2)-> count();
        //dd($user);
        return view('user', ['data' => $user]);

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
}
