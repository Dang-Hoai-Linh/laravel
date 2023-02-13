<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestDBController extends Controller
{
    public function list()
    {
        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);

        $users = DB::table('users')->get();
 
        // foreach ($users as $user) {
        //     echo $user->username;
        // }

        return view('user.list', ['users' => $users]);
    }
}




