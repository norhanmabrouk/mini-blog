<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     public function index()
    {
        $users = DB::table('users')->where('id','>=', '1')->get();
        $user = DB::table('users')->where('name', 'users1')->first();
        // dd($user);

        return view('users.all', ['users' => $users]);
    }

    public function show($id){

        // m-   v   - c

        //Routing  -> web    -> posts/{id}    ->   controller   -> create new method show
        // show -> model return data
        // view
        $user = User::findOrFail($id);
        // dd($post);

        return view('users.view',['user' => $user]);

    }


}
